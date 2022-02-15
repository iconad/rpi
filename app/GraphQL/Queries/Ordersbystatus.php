<?php

namespace App\GraphQL\Queries;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class Ordersbystatus
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        $term = $args['term'];

        if($args['status'] === 'all') {

            if ($args['search_by'] === 'id') {

                $orders = Order::where('user_id', $args['user_id'])
                ->when($args['term'], function ($query, $term) {
                    $query->where('id', $term);
                })->orderBy('created_at', 'DESC')->get();

            }else{

                $orders = Order::with('product')
                ->where('user_id', $args['user_id'])
                ->when($args['term'], function ($query, $term) {
                    $query->whereHas('product', function($q2) use ($term) {
                        $q2->where('title', 'LIKE', "%{$term}%");
                    });
                })->orderBy('created_at', 'DESC')->get();
            }


        }else{

            if ($args['search_by'] === 'id') {

                $orders = Order::where('status', '=', $args['status'])
                ->where('user_id', $args['user_id'])
                ->when($args['term'], function ($query, $term) {
                    $query->where('id', $term);
                })->orderBy('created_at', 'DESC')->get();

            }else{

                $orders = Order::with('product')
                ->where('status', '=', $args['status'])
                ->where('user_id', $args['user_id'])
                ->when($args['term'], function ($query, $term) {
                    $query->whereHas('product', function($q2) use ($term) {
                        $q2->where('title', 'LIKE', "%{$term}%");
                    });
                })->orderBy('created_at', 'DESC')->get();
            }



        }

        return $orders;
    }
}

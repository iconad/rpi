<?php

namespace App\GraphQL\Queries;
use App\Models\Category;

class TopProducts
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        $categoreis = Category::whereHas('products', function ($query) {
            $query->where('status', '=', 1);
        })
        ->whereHas('products.packages', function ($query) {
            $query->where('status', '=', 1);
        })
        ->whereHas('products.packages.prices')
        ->whereHas('products.packages.prices.sizes')
        ->where('menu_id',$args['menu'])
        ->where('status', 1)
        ->get();


        return $categoreis;
    }
}

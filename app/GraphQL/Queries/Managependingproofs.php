<?php

namespace App\GraphQL\Queries;

use App\Models\PendingProof;

class Managependingproofs
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        $term = $args['term'];

        if($args['status'] === 'all') {

            $pps = PendingProof::when($args['term'], function ($query, $term) {
                $query->where('id', $term);
            })->orderBy('created_at', 'DESC')->get();

        }else{

            $pps = PendingProof::where('status', '=', $args['status'])
            ->when($args['term'], function ($query, $term) {
                $query->where('id', $term);
            })->orderBy('created_at', 'DESC')->get();

        }
        return $pps;
    }
}

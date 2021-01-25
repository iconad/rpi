<?php

namespace App\GraphQL\Queries;

use App\Models\Finishing;

class Finishingsbyproduct
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        return Finishing::whereHas('products', function ($query) use ($args) {
            $query->where('id', '=', $args['product_id']);
        })
        ->where('status', 1)
        ->get();
    }
}

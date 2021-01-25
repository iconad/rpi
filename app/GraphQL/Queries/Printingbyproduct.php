<?php

namespace App\GraphQL\Queries;

use App\Models\Printing;

class Printingbyproduct
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        return Printing::whereHas('products', function ($query) use ($args) {
            $query->where('id', '=', $args['product_id']);
        })
        ->where('status', 1)
        ->get();
    }
}

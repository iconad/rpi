<?php

namespace App\GraphQL\Queries;

use App\Models\Product;

class Productsbysubcategory
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        return Product::where('sub_category_id', $args['subcatg_id'])
        ->where('status', 1)
        ->get();
    }
}

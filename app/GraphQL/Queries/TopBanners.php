<?php

namespace App\GraphQL\Queries;
use App\Models\Category;

class TopBanners
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
        ->where('menu_id',12)
        ->where('status', 1)
        ->get();


        return $categoreis;
    }
}

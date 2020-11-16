<?php

namespace App\GraphQL\Queries;
use App\Models\Size;

class Sizesbycategory
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        $sizes = Size::whereHas('menus', function ($query) use ($args) {
            $query->where('id', '=', $args['catg_id']);
        })
        ->where('status', 1)
        ->get();


        return $sizes;
    }
}

<?php

namespace App\GraphQL\Queries;

use App\Models\Category;
use App\Models\SubCategory;

class Subsbycategory
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        $subs = SubCategory::where('category_id', $args['catg_id'])->get();
        return $subs;
    }
}

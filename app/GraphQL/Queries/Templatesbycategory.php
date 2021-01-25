<?php

namespace App\GraphQL\Queries;

use App\Models\Template;

class Templatesbycategory
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        return Template::where('template_category_id', $args['category_id'])
        ->get();
    }
}

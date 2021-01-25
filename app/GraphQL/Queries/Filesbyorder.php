<?php

namespace App\GraphQL\Queries;

use App\Models\File;

class Filesbyorder
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        return File::where('order_id', $args['order_id'])
        ->where('status', 1)
        ->get();
    }
}

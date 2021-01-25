<?php

namespace App\GraphQL\Queries;

use App\Models\PrintingOption;

class Printingoptions
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        return PrintingOption::where('printing_id', $args['print_id'])
        ->where('status', 1)
        ->get();
    }
}

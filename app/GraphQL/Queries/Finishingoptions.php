<?php

namespace App\GraphQL\Queries;

use App\Models\FinishingOption;

class Finishingoptions
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        return FinishingOption::where('finishing_id', $args['finish_id'])
        ->where('status', 1)
        ->get();
    }
}

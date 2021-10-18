<?php

namespace App\GraphQL\Queries;

use App\Models\SelectedOptions as ModelsSelectedOptions;

class Selectedoptions
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        return ModelsSelectedOptions::where('selected_finishing_id', $args['selected_finishing_id'])->get();
    }
}

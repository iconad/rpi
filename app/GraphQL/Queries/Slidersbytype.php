<?php

namespace App\GraphQL\Queries;

use App\Models\Carousel;

class Slidersbytype
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        $sliders = Carousel::where('status', 1)->where('type', $args['type'])->get();
        return $sliders;
    }
}

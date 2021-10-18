<?php

namespace App\GraphQL\Queries;

use App\Models\PackagePriceSizesPrice;

class Finishingsbyquantity
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        return PackagePriceSizesPrice::where('package_price_size_id', $args['package_price_size_id'])->get();
    }
}

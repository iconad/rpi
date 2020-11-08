<?php

namespace App\Traits;
use Illuminate\Http\Request;

trait PointsLeft {

    public function checkPoints()
    {
        $total = 4;
        $left = $total - count($this->points);
        return $left;
    }
}


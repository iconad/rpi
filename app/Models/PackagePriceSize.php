<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackagePriceSize extends Model
{
    use HasFactory;

    public $fillable = ['package_price_id', 'size_id', 'price'];

    public function package_price() {
        return $this->belongsTo(PackagePrice::class)->where('status', 1);
    }


    public function size() {
        return $this->belongsTo(Size::class)->where('status', 1);
    }

}

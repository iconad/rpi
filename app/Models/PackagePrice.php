<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackagePrice extends Model
{
    use HasFactory;

    public $fillable = [
        'package_id',
        'size_id',
        'quantity'
    ];

    public function size() {
        return $this->belongsTo(Size::class)->where('status', 1);
    }

    public function package() {
        return $this->belongsTo(Package::class)->where('status', 1);
    }

    public function sizes() {
        return $this->hasMany(PackagePriceSize::class);
    }

}

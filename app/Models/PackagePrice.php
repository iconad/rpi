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
        'price',
    ];

    public function size() {
        return $this->belongsTo(Size::class)->where('status', 1);
    }

    public function package() {
        return $this->belongsTo(Package::class)->where('status', 1);
    }

}

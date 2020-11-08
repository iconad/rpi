<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    public $fillable = [
        'quantity',
        'paper_id',
        'user_id',
        'product_id',
        'status',
        'order',
    ];

    public function prices() {
        return $this->hasMany(PackagePrice::class);
    }
    public function paper() {
        return $this->belongsTo(Paper::class)->where('status', 1);
    }
    public function product() {
        return $this->belongsTo(Product::class)->where('status', 1);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'short_title',
        'stock',
        'price',
        'product_id',
        'color_id',
        'material_id',
        'status',
        'featured',
        'order',
    ];

    public function product () {
        return $this->belongsTo(Product::class);
    }

    public function colors () {
        return $this->belongsToMany(Color::class);
    }

    public function material () {
        return $this->belongsTo(Material::class);
    }

    public function color () {
        return $this->belongsTo(Color::class);
    }

}

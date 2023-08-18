<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Printing extends Model
{
    use HasFactory, Sluggable;

    public $fillable = ['title', 'slug', 'user_id', 'body', 'order', 'status', 'delivery_time'];

    public function sluggable(): array 
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function products () {
        return $this->belongsToMany(Product::class)->where('status', 1);
    }

    public function options () {
        return $this->hasMany(PrintingOption::class)->where('status', 1);
    }

}

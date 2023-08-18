<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Menu extends Model
{
    use HasFactory, Sluggable;

    public $fillable = ['title', 'slug', 'link', 'user_id', 'excerpt', 'status', 'order'];

    public function sluggable(): array 
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function sizes() {
        return $this->belongsToMany(Size::class);
    }

    public function label() {
        return $this->belongsTo(Label::class)->where('status', 1);
    }

    public function categories() {
        return $this->hasMany(Category::class)->whereHas('products', function($q) {
            $q->where('status', 1)->orderBy('id', 'ASC');
        })->orderBy('id', 'ASC');
    }
    public function categories_all() {
        return $this->hasMany(Category::class);
    }

}

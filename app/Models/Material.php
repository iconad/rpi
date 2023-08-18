<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Material extends Model
{
    use HasFactory, Sluggable;

    public $fillable = ['title', 'slug', 'detail', 'min', 'max', 'excerpt', 'status', 'order'];

    public function sluggable(): array 
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


}

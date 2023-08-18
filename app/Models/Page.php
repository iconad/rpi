<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Page extends Model
{
    use HasFactory, sluggable;

    public function sluggable(): array 
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public $fillable = ['title', 'short_title', 'body', 'page_category_id'];

    public function category() {
        return $this->belongsTo(PageCategory::class, 'page_category_id');
    }
}

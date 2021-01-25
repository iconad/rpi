<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Cviebrock\EloquentSluggable\Sluggable;

class File extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, Sluggable;

    public $fillable = ['title', 'slug', 'order_id', 'type', 'order', 'status', 'cloud'];


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function order() {
        return $this->belongsTo(Order::class);
    }

}

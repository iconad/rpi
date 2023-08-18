<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Cviebrock\EloquentSluggable\Sluggable;

class Point extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, Sluggable;

    public $fillable = ['title', 'slug', 'body', 'product_id', 'user_id', 'order', 'featured', 'status'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */

    public function sluggable(): array 
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(50)
            ->optimize()
            ->sharpen(10);

        $this->addMediaConversion('opt')
            ->optimize()
            ->sharpen(10);
    }

}

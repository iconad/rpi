<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Traits\PointsLeft;
use Image;

class TemplateCategory extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, Sluggable;

    public $fillable = [
        'title',
        'slug',
        'excerpt',
        'status',
        'order',
        'created_at'
    ];

    public function sluggable()
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
              ->width(100);
        $this->addMediaConversion('medium')
              ->width(400);
    }

    public function templates() {
        return $this->hasMany(Template::class);
    }
}

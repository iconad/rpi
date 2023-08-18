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

class Template extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, Sluggable;

    public $fillable = [
        'title',
        'slug',
        'excerpt',
        'size',
        'status',
        'template_category_id',
        'order',
        'created_at'
    ];

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
              ->width(100);
        $this->addMediaConversion('medium')
              ->width(400);
    }

    public function category() {
        return $this->belongsTo(TemplateCategory::class, 'template_category_id');
    }

    public function files() {
        return $this->hasMany(TemplateFile::class);
    }

}

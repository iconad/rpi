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

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, Sluggable, PointsLeft;

    public $fillable = [
        'title',
        'title_two',
        'slug',
        'user_id',
        'excerpt',
        'body',
        'featured',
        'status',
        'body_title',
        'body_subtitle',
        'quantity',
        'delivery_time',
        'order',
        'label_id',
        'category_id',
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
              ->width(100)
              ->sharpen(10);
    }

    public function label() {
        return $this->belongsTo(Label::class)->where('status', 1);
    }

    public function category() {
        return $this->belongsTo(Category::class)->where('status', 1);
    }

    public function points() {
        return $this->hasMany(Point::class)->where('status', 1);
    }

    public function packages() {
        return $this->hasMany(Package::class)->where('status', 1);
    }

    public function finishings () {
        return $this->belongsToMany(Finishing::class)->where('status', 1);
    }

    public function thumbnail () {
        return $this->getMedia('images')[0]->getUrl();
    }


}

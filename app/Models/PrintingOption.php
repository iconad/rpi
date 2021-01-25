<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use App\Traits\PointsLeft;
use Image;

class PrintingOption extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, Sluggable;


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public $fillable = ['title', 'slug', 'price', 'type', 'size', 'selection_type', 'printing_id', 'order', 'days'];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
              ->width(100);
        $this->addMediaConversion('medium')
              ->width(400);
    }

    public function finishing () {
        return $this->belongsTo(Printing::class)->where('status', 1);
    }
}

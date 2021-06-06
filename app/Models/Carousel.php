<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;

class Carousel extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public $fillable = ['title', 'product_id', 'type', 'link', 'order', 'status'];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
              ->width(100);
        $this->addMediaConversion('medium')
              ->width(400);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Cviebrock\EloquentSluggable\Sluggable;
use EloquentFilter\Filterable;

class SubCategory extends Model  implements HasMedia
{
    use HasFactory, InteractsWithMedia, Sluggable, Filterable;

    public $fillable = ['title', 'subtitle', 'slug', 'category_id', 'user_id', 'excerpt', 'body', 'menu_id', 'featured', 'status'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    // public function modelFilter()
    // {
    //     return $this->provideFilter(\App\ModelFilters\CustomFilters\CustomUserFilter::class);
    // }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->format('webp')
            ->width(120)
            ->optimize();

        $this->addMediaConversion('opt')
            ->format('webp')
            ->optimize();
    }

    public function label() {
        return $this->belongsTo(Label::class)->where('status', 1);
    }

    public function menu() {
        return $this->belongsTo(Menu::class)->where('status', 1);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function products() {
        return $this->hasMany(Product::class)->where('status', 1);
    }

    public function ordreProducts() {
        return $this->hasMany(Product::class, function ($q) {
            $q->variants->lowestPrice();
        } )->where('status', 1);
    }


}

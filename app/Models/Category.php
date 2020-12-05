<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, Sluggable;

    public $fillable = ['title', 'slug', 'user_id', 'excerpt', 'body', 'menu_id', 'featured', 'status'];


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */

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

    public function products() {
        return $this->hasMany(Product::class)->where('status', 1);
    }

    public function subcategories() {
        return $this->hasMany(SubCategory::class)->where('status', 1);
    }

    public function subCategoriesAll() {
        return $this->hasMany(SubCategory::class);
    }

    public function top_print_prodicts() {
        return $this->where('menu_id', 10)->get();
    }

}

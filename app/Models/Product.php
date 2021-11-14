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
        'stock',
        'brand',
        'color_id',
        'cloth_type',
        'pricing_type',
        'rule_of_120',
        'type',
        'material',
        'gender',
        'neck',
        'custom_link',
        'unique_code',
        'body_title',
        'body_subtitle',
        'quantity',
        'delivery_time',
        'order',
        'label_id',
        'category_id',
        'sub_category_id',
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

    public function label() {
        return $this->belongsTo(Label::class)->where('status', 1);
    }

    public function category() {
        return $this->belongsTo(Category::class)->where('status', 1);
    }

    public function subCategory() {
        return $this->belongsTo(SubCategory::class);
    }

    public function points() {
        return $this->hasMany(Point::class)->where('status', 1);
    }

    public function packages() {
        return $this->hasMany(Package::class)->where('status', 1);
    }

    public function allpackages() {
        return $this->hasMany(Package::class);
    }

    public function finishings () {
        return $this->belongsToMany(Finishing::class)->where('status', 1);
    }

    public function selectedFinishings () {
        return $this->hasMany(SelectedFinishing::class);
    }

    public function colors () {
        return $this->belongsToMany(Color::class);
    }

    public function color () {
        return $this->belongsTo(Color::class);
    }

    public function variants () {
        return $this->hasMany(Variant::class)->with('color');
    }

    public function thumbnail () {
        return $this->getMedia('images')[0]->getUrl();
    }

    public function lowestPrice () {
        return $this->hasMany(Variant::class)->orderBy("price")->first();
    }

    public function minPrice () {
        return $this->hasMany(Variant::class)->min("price");
    }
    public function maxPrice () {
        return $this->hasMany(Variant::class)->max("price");
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\MediaLibrary\InteractsWithMedia;

class SelectedOptions extends Model
{
    use HasFactory, Sluggable;


    public function sluggable(): array 
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public $fillable = ['title', 'slug', 'price', 'option_id', 'finishing_id', 'selected_finishing_id', 'days'];

    public function selectedFinishing () {
        // return $this->belongsTo(SelectedFinishing::class, 'selected_options', 'selected_finishing_id');
        return $this->belongsTo(SelectedFinishing::class);
    }

    public function option () {
        return $this->belongsTo(FinishingOption::class);
    }

}

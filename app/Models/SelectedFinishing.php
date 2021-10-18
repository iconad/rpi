<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectedFinishing extends Model
{
    use HasFactory;

    public $fillable = ['product_id', 'finishing_id'];


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function finishing () {
        return $this->belongsTo(Finishing::class);
    }

    public function options () {
        return $this->hasMany(SelectedOptions::class);
    }
}

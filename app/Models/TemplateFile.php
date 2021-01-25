<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;

class TemplateFile extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public $fillable = ['title', 'type', 'order', 'template_id', 'status'];

    public function tempalte() {
        return $this->belongsTo(Template::class);
    }
}

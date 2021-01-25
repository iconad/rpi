<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    public $fillable = ['region', 'price', 'landscape', 'portrait', 'unit', 'content_types', 'user_id', 'type', 'status', 'order'];

    public function menus() {
        return $this->belongsToMany(Menu::class)->where('status', 1);
    }

}

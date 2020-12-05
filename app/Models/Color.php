<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{

    public $fillable = ['title', 'hex', 'hex8', 'rgba', 'status', 'order'];

    use HasFactory;

    public function gifts () {
        return $this->belongsToMany(Product::class);
    }

}

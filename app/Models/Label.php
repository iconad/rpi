<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{

    public $fillable = ['title', 'user_id', 'color', 'status', 'order'];

    use HasFactory;
}

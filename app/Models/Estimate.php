<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    use HasFactory;

    public $fillable = ['company', 'first_name', 'last_name', 'product', 'quantity', 'size', 'detail', 'email', 'phone'];

    public function responses () {
        return $this->hasMany(EstimateReply::class)->orderBy('created_at', 'desc');
    }


}

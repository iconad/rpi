<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstimateReply extends Model
{
    use HasFactory;
    public $fillable = ['message', 'estimate_id'];


    public function estimate () {
        return $this->hasOne(Estimate::class);
    }

}

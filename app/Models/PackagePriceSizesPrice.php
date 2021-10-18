<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackagePriceSizesPrice extends Model
{
    use HasFactory;


    public $fillable = ['finishing', 'price',  'days', 'option_id', 'option_title', 'finishing_id', 'package_price_size_id'];

    public function selectedOption () {
        return $this->belongsTo(SelectedOptions::class, 'option_id');
    }

    public function selectedFinishing () {
        return $this->belongsTo(SelectedFinishing::class, 'finishing_id');
    }

}

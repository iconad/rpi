<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $fillable = [
        'title',
        'paper_size',
        'paper_color',
        'paper',
        'paper_quantity',
        'gift_quantity',
        'gift_color',
        'is_design',
        'paper_finishings',
        'shirt_color',
        'shirt_sizes',
        'shirt_printings',
        'turnaround',
        'price_product',
        'price_extra',
        'price_printing',
        'price_vat',
        'price_total',
        'product_type',
        'product_id',
        'user_id',
        'status',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function proof() {
        return $this->hasOne(PendingProof::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function pendingproof() {
        return $this->hasOne(PendingProof::class);
    }

    public function files() {
        return $this->hasMany(File::class);
    }

    public function cart() {
        return $this->belongsTo(Product::class)->where('status', 'cart');
    }

    public function pending() {
        return $this->belongsTo(Product::class)->where('status', 'pending');
    }

    public function confirmed() {
        return $this->belongsTo(Product::class)->where('status', 'confirmed');
    }

    public function onhold() {
        return $this->belongsTo(Product::class)->where('status', 'on-hold');
    }

    public function delivered() {
        return $this->belongsTo(Product::class)->where('status', 'delivered');
    }

    public function cancelled() {
        return $this->belongsTo(Product::class)->where('status', 'cancelled');
    }

    public function rejected() {
        return $this->belongsTo(Product::class)->where('status', 'rejected');
    }

}

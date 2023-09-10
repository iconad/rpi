<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producthome extends Model
{
    protected $table = 'products'; // Replace 'products' with the actual table name if different

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'body_title',
        'body_subtitle',
        'delivery_time',
        'rule_of_120',
        'pricing_type',
        'quantity',
        'height',
        'width',
        'user_id',
        'label_id',
        'status',
        'order',
        'created_at',
        'updated_at',
        'featured',
        'category_id',
        'printing',
        'printing_text',
        'custom_link',
        'title_two',
        'stock',
        'sub_category_id',
        'type',
        'color_id',
        'gender',
        'neck',
        'material',
        'cloth_type',
        'brand',
        'unique_code',
    ];

    // Add any relationships or custom methods here if needed
}

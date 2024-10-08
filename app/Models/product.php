<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_short_des',
        'product_des',
        'product_price',
        'product_category_id',
        'product_category_name',
        'product_subcategory_id',
        'product_subcategory_name',
        'product_quantity',
        'product_img',
        'slug',
    ];
}

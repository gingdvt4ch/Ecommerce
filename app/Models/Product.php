<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // tables field
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'product_name', 
        'description', 
        'product_price', 
        'category_id',
        'user_id',
        'stock_quantity',
        'stock_status',
        'product_image',
    ];

    //Insert here tong mga relationship ani (code) 
}

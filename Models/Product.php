<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // mga column/attributes
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

    //tong mga relationship ani nya ibutang
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

}

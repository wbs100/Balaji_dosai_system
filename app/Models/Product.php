<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'status',
        'sku',
        'has_color',
        'brand_id',
        'category_id',
        'cost_price',
        'selling_price',
        'product_discount',
        'stock_quantity',
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function primaryImage()
    {
        return $this->hasOne(ProductImage::class)->where('is_primary', 1);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // public function batches()
    // {
    //     return $this->hasMany(ProductBatch::class);
    // }

    // public function colors()
    // {
    //     return $this->belongsToMany(Color::class, 'product_colors');
    // }
}

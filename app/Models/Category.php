<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    /**
     * Brands related to this category (many-to-many)
     */
    public function brands()
    {
        return $this->belongsToMany(Brand::class, 'brand_categories');
    }

    /**
     * Products under this category (one-to-many)
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

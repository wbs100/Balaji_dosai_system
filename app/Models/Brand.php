<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name'];

    /**
     * Categories this brand belongs to (many-to-many)
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'brand_category');
    }

    /**
     * Products under this brand (one-to-many)
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

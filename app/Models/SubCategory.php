<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Categories this brand belongs to (many-to-many)
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_has_sub_categories');
    }

    /**
     * Products under this brand (one-to-many)
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

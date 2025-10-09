<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryHasSubCategory extends Model
{
    protected $table = 'category_has_sub_categories';

    protected $fillable = ['sub_category_id', 'category_id'];

    public $timestamps = true;
}

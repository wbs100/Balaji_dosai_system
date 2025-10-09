<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Other'],
            ['name' => 'Dosa'],
            ['name' => 'Idli'],
            ['name' => 'Vada'],
            ['name' => 'Pongal'],
            ['name' => 'Uthappam'],
            ['name' => 'Chutney'],
            ['name' => 'Sambar'],
            ['name' => 'Rice'],
            ['name' => 'Snacks'],
            ['name' => 'Sweets'],
            ['name' => 'Beverages'],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(['name' => $category['name']], $category);
        }
    }
}

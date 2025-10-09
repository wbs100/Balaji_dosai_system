<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\BrandCategory;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brandsWithCategories = [
            'DeWalt' => ['Power Tools', 'Hand Tools'],
            'Bosch' => ['Power Tools', 'Electrical'],
            'Hilti' => ['Power Tools', 'Fasteners'],
            '3M' => ['Safety Equipment', 'Paint & Supplies'],
            'Stanley' => ['Hand Tools', 'Fasteners'],
            'Klein Tools' => ['Electrical', 'Hand Tools'],
            'Makita' => ['Power Tools'],
            'Milwaukee' => ['Power Tools', 'Hand Tools'],
            'Gardner Bender' => ['Electrical'],
            'Werner' => ['Ladders & Scaffolding'],
        ];

        foreach ($brandsWithCategories as $brandName => $categoryNames) {
            // Create or get the brand
            $brand = Brand::updateOrCreate(['name' => $brandName]);

            foreach ($categoryNames as $categoryName) {
                $category = Category::where('name', $categoryName)->first();

                if ($category) {
                    // Insert into brand_category using the model
                    BrandCategory::firstOrCreate([
                        'brand_id' => $brand->id,
                        'category_id' => $category->id,
                    ]);
                }
            }
        }
    }
}

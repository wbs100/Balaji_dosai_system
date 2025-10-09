<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryHasSubCategory;
use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subCategoriesWithCategories = [
            'Car Battery' => ['Four Wheel'],
            'Lorry Battery' => ['Four Wheel'],
            'Van Battery' => ['Four Wheel'],
            'Bus Battery' => ['Four Wheel'],
            'Start & Stop Battery (EFB)' => ['Four Wheel'],
            'DIN Battery' => ['Four Wheel'],
        ];

        foreach ($subCategoriesWithCategories as $subCategoryName => $categoryNames) {

            $sub_category = SubCategory::updateOrCreate(['name' => $subCategoryName]);

            foreach ($categoryNames as $categoryName) {
                $category = Category::where('name', $categoryName)->first();

                if ($category) {
                    CategoryHasSubCategory::firstOrCreate([
                        'sub_category_id' => $sub_category->id,
                        'category_id' => $category->id,
                    ]);
                }
            }
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\admin\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Electronics',
            'Fashion',
            'Mobile Phones',
            'Laptops',
            'Home Appliances',
            'Beauty & Personal Care',
            'Sports',
            'Books',
            'Toys',
            'Groceries',
            'Furniture',
            'Health',
            'Automobile',
            'Gaming',
            'Camera',
            'Accessories',
            'Shoes',
            'Watches',
            'Jewelry',
            'Men Clothing',
        ];

        for ($i = 1; $i <= 50; $i++) {

            $name = $categories[array_rand($categories)] . ' ' . $i;

            Category::create([
                'parent_id' => 0,
                'category_name' => $name,
                'slug' => Str::slug($name),
                'image' => 'https://i.pravatar.cc/150?img=' . rand(1, 70),
                'created_by' => 1,
                'category_type' => 1,
                'status' => 1,
            ]);
        }
    }
}

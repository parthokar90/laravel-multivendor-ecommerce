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

        $imageMap = [
            'Electronics' => 'technology gadgets circuit',
            'Fashion' => 'clothing fashion style',
            'Mobile Phones' => 'smartphone mobile',
            'Laptops' => 'laptop computer',
            'Home Appliances' => 'kitchen appliances',
            'Beauty & Personal Care' => 'beauty skincare makeup',
            'Sports' => 'sports fitness gym',
            'Books' => 'books library reading',
            'Toys' => 'toys kids play',
            'Groceries' => 'grocery supermarket food',
            'Furniture' => 'furniture interior',
            'Health' => 'health medical wellness',
            'Automobile' => 'car vehicle transport',
            'Gaming' => 'gaming console esports',
            'Camera' => 'camera photography',
            'Accessories' => 'fashion accessories',
            'Shoes' => 'shoes sneakers footwear',
            'Watches' => 'watches luxury',
            'Jewelry' => 'jewelry gold diamond',
            'Men Clothing' => 'men fashion clothing'
        ];

        for ($i = 1; $i <= 50; $i++) {

            $baseName = $categories[array_rand($categories)];
            $name = $baseName . ' ' . $i;

            $keyword = $imageMap[$baseName] ?? 'shopping store';

            Category::create([
                'parent_id' => 0,
                'category_name' => $name,
                'slug' => Str::slug($name),

                'image' => 'https://images.unsplash.com/photo-1503602642458-232111445657',

                'created_by' => 1,
                'category_type' => 1,
                'status' => 1,
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\admin\Brand;
use App\Models\admin\Category;
use App\Models\vendor\Shop;
use App\Models\vendor\Product;
use App\Models\vendor\Vendor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $brandIds = Brand::pluck('id')->toArray();
        $categoryIds = Category::pluck('id')->toArray();
        $shopIds = Shop::pluck('id')->toArray();
        $vendorIds = Vendor::pluck('id')->toArray();

        if (empty($brandIds) || empty($categoryIds) || empty($shopIds) || empty($vendorIds)) {
            $this->command->info('Please seed Brand, Category, Shop, and Vendor first.');
            return;
        }

        $faker = \Faker\Factory::create();

        $productNames = [
            'iPhone 15 Pro Max', 'Samsung Galaxy S24', 'Dell XPS Laptop', 'Sony Headphone',
            'Nike Air Max Shoe', 'Gaming Keyboard', 'Smart LED TV', 'Apple Smart Watch',
            'MacBook Pro', 'Google Pixel 8', 'Asus ROG Phone', 'HP Spectre x360',
            'Logitech Mouse', 'Razer Headset', 'Canon DSLR Camera', 'DJI Drone'
        ];

        $images = [
            'https://placehold.co/600x600/png',
            'https://placehold.co/600x600?text=Product',
            'https://placehold.co/600x600/EEE/31343C',
            'https://placehold.co/600x600/orange/white',
        ];

        $totalProducts = 50;
        
        for ($i = 0; $i < $totalProducts; $i++) {
            
            $brandId  = $brandIds[$i % count($brandIds)];
            $shopId   = $shopIds[$i % count($shopIds)];
            $vendorId = $vendorIds[$i % count($vendorIds)];
            
            $baseName = Arr::random($productNames);
            $productName = $baseName . ' ' . ($i + 1); 
            $price = rand(5000, 200000);

            $product = Product::create([
                'product_name' => $productName,
                'product_slug' => Str::slug($productName),
                'image' => $images[array_rand($images)],
                'brand_id' => $brandId,
                'shop_id' => $shopId,
                'vendor_id' => $vendorId,
                'short_description' => 'High quality product.',
                'long_description' => 'Premium build quality with best performance.',
                'regular_price' => $price,
                'sale_price' => $price - rand(500, 4000),
                'quantity' => rand(10, 100),
                'created_by' => 1,
                'status' => 1,
            ]);

            if ($i < count($categoryIds)) {
                $assignedCategories = [$categoryIds[$i]];
            } else {
                $assignedCategories = collect($categoryIds)->random(rand(1, 3))->toArray();
            }

            foreach ($assignedCategories as $catId) {
                DB::table('product_categories')->insert([
                    'product_id' => $product->id,
                    'category_id' => $catId,
                    'created_by' => 1,
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        $this->command->info('Successfully seeded 50 products ensuring all relations are mapped!');
    }
}
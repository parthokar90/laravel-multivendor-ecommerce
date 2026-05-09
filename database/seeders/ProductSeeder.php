<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\admin\Brand;
use App\Models\admin\Category;
use App\Models\vendor\Shop;
use App\Models\vendor\Product;
use App\Models\vendor\Vendor;
use DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $brandIds = Brand::pluck('id')->toArray();
        $categoryIds = Category::pluck('id')->toArray();
        $shopIds = Shop::pluck('id')->toArray();
        $vendorIds = Vendor::pluck('id')->toArray();

        if (empty($brandIds) || empty($categoryIds) || empty($shopIds)) {
            $this->command->info('Please seed Brand, Category and Shop first.');
            return;
        }

        $products = [
            ['name' => 'iPhone 15 Pro Max', 'price' => 185000],
            ['name' => 'Samsung Galaxy S24', 'price' => 142000],
            ['name' => 'Dell XPS Laptop', 'price' => 125000],
            ['name' => 'Sony Headphone', 'price' => 18500],
            ['name' => 'Nike Air Max Shoe', 'price' => 9500],
            ['name' => 'Gaming Keyboard', 'price' => 6500],
            ['name' => 'Smart LED TV', 'price' => 72000],
            ['name' => 'Apple Smart Watch', 'price' => 48000],
        ];

        $images = [
            'https://placehold.co/600x600/png',
            'https://placehold.co/600x600?text=Product',
            'https://placehold.co/600x600/EEE/31343C',
            'https://placehold.co/600x600/orange/white',
        ];

        foreach ($products as $item) {

            $product = Product::create([
                'product_name' => $item['name'],
                'product_slug' => Str::slug($item['name']),
                'image' => $images[array_rand($images)],
                'brand_id' => $brandIds[array_rand($brandIds)],
                'shop_id' => $shopIds[array_rand($shopIds)],
                'vendor_id' => $vendorIds[array_rand($vendorIds)],
                'short_description' => 'High quality product.',
                'long_description' => 'Premium build quality with best performance.',
                'regular_price' => $item['price'],
                'sale_price' => $item['price'] - rand(500, 5000),
                'quantity' => rand(10, 100),
                'created_by' => 1,
                'status' => 1,
            ]);

            // ✅ attach random 1-3 categories
            $randomCategories = collect($categoryIds)
                ->random(rand(1, 3))
                ->toArray();

            foreach ($randomCategories as $catId) {
                \DB::table('product_categories')->insert([
                    'product_id' => $product->id,
                    'category_id' => $catId,
                    'created_by' => 1,
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}

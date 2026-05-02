<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\admin\Brand;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
            'Apple',
            'Samsung',
            'Sony',
            'LG',
            'Dell',
            'HP',
            'Lenovo',
            'Asus',
            'Nike',
            'Adidas',
        ];

        $images = [
            'https://images.unsplash.com/photo-1518770660439-4636190af475',
            'https://images.unsplash.com/photo-1523275335684-37898b6baf30',
            'https://images.unsplash.com/photo-1517336714731-489689fd1ca8',
            'https://images.unsplash.com/photo-1503602642458-232111445657',
        ];

        for ($i = 1; $i <= 10; $i++) {

            $base = $brands[array_rand($brands)];
            $name = $base;

            Brand::create([
                'brand_name' => $name,
                'slug' => Str::slug($name),

                'image' => $images[array_rand($images)],

                'created_by' => 1,
                'status' => rand(0, 1),
            ]);
        }
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\vendor\Shop;
use App\Models\vendor\Vendor;

class ShopSeeder extends Seeder
{
    public function run(): void
    {
        $vendorIds = Vendor::pluck('id')->toArray();

        if (empty($vendorIds)) {
            $this->command->info("No vendors found. Please seed vendors first.");
            return;
        }

        $shopNames = [
            'Tech World',
            'Fashion Hub',
            'Mobile Galaxy',
            'Laptop Zone',
            'Home Mart',
            'Beauty Palace',
            'Sports Arena',
            'Book Corner',
            'Toy Land',
            'Fresh Grocery',
        ];

        $logos = [
            'https://images.unsplash.com/photo-1523275335684-37898b6baf30',
            'https://images.unsplash.com/photo-1518770660439-4636190af475',
            'https://images.unsplash.com/photo-1517336714731-489689fd1ca8',
            'https://images.unsplash.com/photo-1503602642458-232111445657',
        ];

        $banners = [
            'https://images.unsplash.com/photo-1505691938895-1758d7feb511',
            'https://images.unsplash.com/photo-1521334884684-d80222895322',
            'https://images.unsplash.com/photo-1483985988355-763728e1935b',
        ];

        for ($i = 1; $i <= 10; $i++) {

            $baseName = $shopNames[array_rand($shopNames)];
            $name = $baseName;

            Shop::create([
                'shop_name' => $name,
                'shop_slug' => Str::slug($name),

                'logo' => $logos[array_rand($logos)],
                'shop_banner' => $banners[array_rand($banners)],

                'shop_address' => 'Dhaka, Bangladesh',

                'vendor_id' => $vendorIds[array_rand($vendorIds)],

                'created_by' => 1,

                'status' => rand(0, 1),
            ]);
        }
    }
}
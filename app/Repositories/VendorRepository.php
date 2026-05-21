<?php

namespace App\Repositories;

use App\Models\vendor\Shop;
use App\Models\vendor\Vendor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class VendorRepository
{
    public function createVendor(array $data): Vendor
    {
        return Vendor::create([
            'first_name' => $data['first_name'],
            'last_name'  => $data['last_name'],
            'email'      => $data['email'],
            'password'   => Hash::make($data['password']),
            'mobile'     => $data['mobile'],
            'role'       => Vendor::ROLE_VENDOR,
            'created_by' => 0,
            'status'     => Vendor::STATUS_INACTIVE,
        ]);
    }

    public function createShop(array $data, int $vendorId): Shop
    {
        $slug = $this->generateUniqueSlug($data['shop_name']);

        return Shop::create([
            'shop_name'  => $data['shop_name'],
            'shop_slug'  => $slug,
            'vendor_id'  => $vendorId,
            'created_by' => 0,
            'status'     => Shop::STATUS_INACTIVE,
        ]);
    }

    private function generateUniqueSlug(string $shopName): string
    {
        $slug      = Str::slug($shopName);
        $original  = $slug;
        $count     = 1;

        while (Shop::where('shop_slug', $slug)->exists()) {
            $slug = "{$original}-{$count}";
            $count++;
        }

        return $slug;
    }
}

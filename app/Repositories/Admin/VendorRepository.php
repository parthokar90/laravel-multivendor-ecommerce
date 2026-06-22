<?php

namespace App\Repositories\Admin;

use App\Models\vendor\Vendor;
use App\Models\vendor\Shop;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class VendorRepository
{
    public function getQueryForDataTable(): Builder
    {
        // Eager load shops relation for robust tracking if needed
        return Vendor::query()->with('shops')->select([
            'id',
            'first_name',
            'last_name',
            'image',
            'mobile',
            'email',
            'status'
        ])->orderBy('id', 'DESC');
    }

    public function findById(int $id): Vendor
    {
        return Vendor::findOrFail($id);
    }

    public function createVendor(array $data): Vendor
    {
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        $data['role'] = Vendor::ROLE_VENDOR;
        $data['created_by'] = auth()->user()->id;

        return Vendor::create($data);
    }

    public function createShop(array $data, int $vendorId): Shop
    {
        return Shop::create([
            'shop_name'    => $data['shop_name'],
            'logo'         => $data['logo'] ?? null,
            'shop_slug'    => Str::slug($data['shop_name']),
            'shop_address' => $data['shop_address'] ?? null,
            'vendor_id'    => $vendorId,
            'created_by'   => auth()->user()->id,
            'status'       => $data['shop_status'] ?? Shop::STATUS_ACTIVE,
        ]);
    }

    public function updateVendor(Vendor $vendor, array $data): Vendor
    {
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']); // Keep current password if empty
        }

        $vendor->update($data);
        return $vendor;
    }

    public function updateShop(Vendor $vendor, array $data): Shop
    {
        $shop = Shop::where('vendor_id', $vendor->id)->first() ?? new Shop();

        $shopData = [
            'shop_name'    => $data['shop_name'],
            'shop_slug'    => Str::slug($data['shop_name']),
            'shop_address' => $data['shop_address'] ?? null,
            'vendor_id'    => $vendor->id,
            'status'       => $data['shop_status'] ?? Shop::STATUS_ACTIVE,
        ];

        if (isset($data['logo'])) {
            $shopData['logo'] = $data['logo'];
        }

        $shop->fill($shopData);
        $shop->save();

        return $shop;
    }

    /**
     * Upload dynamic single asset onto Supabase S3 bucket wrapper
     */
    public function uploadToSupabase(UploadedFile $file, string $folder): string
    {
        $key = $folder . '/' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

        Storage::disk('s3')->put($key, file_get_contents($file), 'public');

        $baseUrl = rtrim(config('filesystems.disks.s3.url'), '/');
        $bucket  = config('filesystems.disks.s3.bucket');

        Log::info("Supabase Vendor Media upload debug [{$folder}]", [
            'baseUrl' => $baseUrl,
            'bucket'  => $bucket,
            'key'     => $key,
        ]);

        return $baseUrl . '/' . $bucket . '/' . $key;
    }

    public function deleteFromSupabase(?string $url): void
    {
        if (!$url) return;

        $baseUrl = rtrim(config('filesystems.disks.s3.url'), '/');
        $bucket  = config('filesystems.disks.s3.bucket');
        $prefix  = $baseUrl . '/' . $bucket . '/';

        if (str_starts_with($url, $prefix)) {
            $key = str_replace($prefix, '', $url);
            if (Storage::disk('s3')->exists($key)) {
                Storage::disk('s3')->delete($key);
            }
        }
    }

    // --- KPI Counter Metrics ---
    public function getTotalCount(): int
    {
        return Vendor::count();
    }
    public function getActiveCount(): int
    {
        return Vendor::where('status', Vendor::STATUS_ACTIVE)->count();
    }
    public function getInactiveCount(): int
    {
        return Vendor::where('status', Vendor::STATUS_INACTIVE)->count();
    }
    public function getNewThisMonthCount(): int
    {
        return Vendor::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)->count();
    }
}

<?php

namespace App\Repositories\Admin;

use App\Models\customer\Customer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\UploadedFile;

class CustomerRepository
{
    public function getTotalCount(): int
    {
        return Customer::count();
    }

    public function getActiveCount(): int
    {
        return Customer::where('status', 1)->count();
    }

    public function getInactiveCount(): int
    {
        return Customer::where('status', 0)->count();
    }

    public function getNewThisMonthCount(): int
    {
        return Customer::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
    }
    
    public function getQueryForDataTable(): Builder
    {
        return Customer::query()->select([
            'id',
            'image',
            'first_name',
            'last_name',
            'email',
            'mobile',
            'status',
            'created_at'
        ]);
    }

    public function findById(int $id): Customer
    {
        return Customer::findOrFail($id);
    }

    public function create(array $data): Customer
    {
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        return Customer::create($data);
    }

    public function update(int $id, array $data): Customer
    {
        $customer = $this->findById($id);

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $customer->update($data);
        return $customer;
    }

    public function delete(int $id): bool
    {
        $customer = $this->findById($id);
        $this->deleteImageFromSupabase($customer->image);
        return $customer->delete();
    }

    /**
     * Upload single image to Supabase using your raw sample architecture
     */
    public function uploadImageToSupabase(UploadedFile $image): string
    {
        // Unique key generation for single customer image
        $key = 'customers/' . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

        // Raw s3 disk stream upload without extra wrapper packages
        Storage::disk('s3')->put($key, file_get_contents($image), 'public');

        // Strictly fetching from config, not env() directly
        $baseUrl = rtrim(config('filesystems.disks.s3.url'), '/');
        $bucket  = config('filesystems.disks.s3.bucket');

        // URL Debug Logger as per your production standard
        Log::info('Customer URL debug', [
            'baseUrl' => $baseUrl,
            'bucket'  => $bucket,
            'key'     => $key,
        ]);

        // Construct exact public URL string
        return $baseUrl . '/' . $bucket . '/' . $key;
    }

    /**
     * Delete image object from storage using the stored full URL
     */
    public function deleteImageFromSupabase(?string $imageUrl): void
    {
        if (!$imageUrl) {
            return;
        }

        $baseUrl = rtrim(config('filesystems.disks.s3.url'), '/');
        $bucket  = config('filesystems.disks.s3.bucket');
        $prefix  = $baseUrl . '/' . $bucket . '/';

        // Extract raw key out of the full Supabase URL
        if (str_starts_with($imageUrl, $prefix)) {
            $key = str_replace($prefix, '', $imageUrl);

            if (Storage::disk('s3')->exists($key)) {
                Storage::disk('s3')->delete($key);
            }
        }
    }
}

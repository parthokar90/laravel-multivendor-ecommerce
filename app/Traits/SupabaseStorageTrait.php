<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

trait SupabaseStorageTrait
{
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

    /**
     * Delete dynamic single asset from Supabase S3 bucket wrapper
     */
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
}

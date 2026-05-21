<?php

namespace App\Services;

use App\Models\vendor\Vendor;
use App\Repositories\VendorRepository;
use Illuminate\Support\Facades\DB;

class VendorService
{
    public function __construct(
        private readonly VendorRepository $vendorRepository
    ) {}

    public function register(array $data): Vendor
    {
        return DB::transaction(function () use ($data) {
            $vendor = $this->vendorRepository->createVendor($data);
            $this->vendorRepository->createShop($data, $vendor->id);

            return $vendor;
        });
    }
}

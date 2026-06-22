<?php

namespace App\Services\Admin;

use App\Repositories\Admin\VendorRepository;
use Yajra\DataTables\Facades\DataTables;
use App\Models\vendor\Vendor;

class VendorService
{
    protected VendorRepository $repository;

    public function __construct(VendorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getDataTable()
    {
        $query = $this->repository->getQueryForDataTable();

        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('first_name', function ($vendor) {
                return $vendor->first_name . ' ' . $vendor->last_name;
            })
            ->editColumn('image', function ($vendor) {
                $url = $vendor->image ?: asset('uploads/default.png');
                return '<img src="' . $url . '" class="img-thumbnail" width="40" height="40">';
            })
            ->editColumn('status', function ($vendor) {
                return $vendor->status == Vendor::STATUS_ACTIVE
                    ? '<span class="badge badge-success">Active</span>'
                    : '<span class="badge badge-danger">Inactive</span>';
            })
            ->addColumn('action', function ($vendor) {
                return '<a class="btn btn-primary btn-sm" title="Edit Vendor" href="' . route('vendors.edit', $vendor->id) . '"><i class="fa fa-edit"></i> Edit Profile</a>';
            })
            ->rawColumns(['image', 'status', 'action'])
            ->make(true);
    }

    public function storeVendor(array $data, $imageFile = null, $logoFile = null)
    {
        if ($imageFile) {
            $data['image'] = $this->repository->uploadToSupabase($imageFile, 'vendors/profile');
        }
        if ($logoFile) {
            $data['logo'] = $this->repository->uploadToSupabase($logoFile, 'vendors/shop');
        }

        $vendor = $this->repository->createVendor($data);
        $this->repository->createShop($data, $vendor->id);

        return $vendor;
    }

    public function updateVendor(Vendor $vendor, array $data, $imageFile = null, $logoFile = null)
    {
        if ($imageFile) {
            $this->repository->deleteFromSupabase($vendor->image);
            $data['image'] = $this->repository->uploadToSupabase($imageFile, 'vendors/profile');
        }
        if ($logoFile) {
            if ($vendor->shops && $vendor->shops->logo) {
                $this->repository->deleteFromSupabase($vendor->shops->logo);
            }
            $data['logo'] = $this->repository->uploadToSupabase($logoFile, 'vendors/shop');
        }

        $this->repository->updateVendor($vendor, $data);
        $this->repository->updateShop($vendor, $data);

        return $vendor;
    }

    public function getVendorInsights(): array
    {
        return [
            'total'          => $this->repository->getTotalCount(),
            'active'         => $this->repository->getActiveCount(),
            'inactive'       => $this->repository->getInactiveCount(),
            'new_this_month' => $this->repository->getNewThisMonthCount(),
        ];
    }
}

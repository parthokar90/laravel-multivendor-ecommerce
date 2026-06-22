<?php

namespace App\Services\Admin;

use App\Repositories\Admin\CustomerRepository;
use Yajra\DataTables\Facades\DataTables;

class CustomerService
{
    protected CustomerRepository $repository;

    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getCustomerInsights(): array
    {
        return [
            'total'      => $this->repository->getTotalCount(),
            'active'     => $this->repository->getActiveCount(),
            'inactive'   => $this->repository->getInactiveCount(),
            'new_this_month' => $this->repository->getNewThisMonthCount(),
        ];
    }

    public function getDataTable()
    {
        $query = $this->repository->getQueryForDataTable();

        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('first_name', function ($customer) {
                return $customer->first_name . ' ' . $customer->last_name;
            })
            ->editColumn('image', function ($customer) {
                $url = $customer->image ?: asset('uploads/default.png');
                return '<img src="' . $url . '" class="img-thumbnail" width="40" height="40">';
            })
            ->editColumn('status', function ($customer) {
                return $customer->status == 1
                    ? '<span class="badge badge-success">Active</span>'
                    : '<span class="badge badge-danger">Inactive</span>';
            })
            ->addColumn('action', function ($customer) {
                $editRoute = route('customers.edit', $customer->id);
                $deleteRoute = route('customers.destroy', $customer->id);

                return '
                    <a href="' . $editRoute . '" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                    <form action="' . $deleteRoute . '" method="POST" style="display:inline-block;">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="submit" onclick="return confirm(\'Are you sure?\')" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                ';
            })
            ->rawColumns(['image', 'status', 'action'])
            ->make(true);
    }

    public function storeCustomer(array $data, $imageFile = null)
    {
        if ($imageFile) {
            // direct file injection without loops
            $data['image'] = $this->repository->uploadImageToSupabase($imageFile);
        }
        return $this->repository->create($data);
    }

    public function updateCustomer(int $id, array $data, $imageFile = null)
    {
        if ($imageFile) {
            $customer = $this->repository->findById($id);
            // safe deletion of past object before re-uploading
            $this->repository->deleteImageFromSupabase($customer->image);
            $data['image'] = $this->repository->uploadImageToSupabase($imageFile);
        }
        return $this->repository->update($id, $data);
    }

    public function deleteCustomer(int $id): bool
    {
        return $this->repository->delete($id);
    }

    public function getCustomer(int $id)
    {
        return $this->repository->findById($id);
    }
}

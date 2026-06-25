<?php

namespace App\Services\Admin;

use App\Repositories\Admin\OrderRepository;
use DataTables;

class OrderService
{
    protected OrderRepository $orderRepo;

    public function __construct(OrderRepository $orderRepo)
    {
        $this->orderRepo = $orderRepo;
    }

    public function getOrdersDataTable()
    {
        $list = $this->orderRepo->getAllOrdersQuery();

        return Datatables::of($list)
            ->addIndexColumn()
            ->addColumn('customer', function ($row) {
                return $row->customer ? $row->customer->first_name : 'Customer #' . $row->user_id;
            })
            ->addColumn('order_date', function ($row) {
                return $row->order_date ? date('M d, Y', strtotime($row->order_date)) : $row->created_at->format('M d, Y');
            })
            ->addColumn('status', function ($row) {
                switch ($row->status) {
                    case 'completed':
                        return '<span class="badge badge-success text-capitalize">Completed</span>';
                    case 'cancelled':
                        return '<span class="badge badge-danger text-capitalize">Cancelled</span>';
                    default:
                        return '<span class="badge badge-warning text-capitalize">Pending</span>';
                }
            })
            ->addColumn('action', function ($row) {
                return '
                    <a class="btn btn-info btn-sm" title="View Details" href="' . route('orders.show', $row->id) . '">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a class="btn btn-primary btn-sm" title="Edit / Change Status" href="' . route('orders.edit', $row->id) . '">
                        <i class="fa fa-edit"></i>
                    </a>
                ';
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }

    public function getDashboardStats(): array
    {
        return $this->orderRepo->getDashboardStats();
    }
}

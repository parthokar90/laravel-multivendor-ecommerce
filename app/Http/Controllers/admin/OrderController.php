<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\OrderService;
use App\Repositories\Admin\OrderRepository;

class OrderController extends Controller
{
    protected OrderService $orderService;
    protected OrderRepository $orderRepo;

    public function __construct(OrderService $orderService, OrderRepository $orderRepo)
    {
        $this->middleware('auth:admin');
        $this->orderService = $orderService;
        $this->orderRepo = $orderRepo;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->orderService->getOrdersDataTable();
        }

        $stats = $this->orderService->getDashboardStats();
        return view('admin.order.list', compact('stats'));
    }

    public function show($id)
    {
        $order = $this->orderRepo->findOrder($id);
        return view('admin.order.show', compact('order'));
    }

    public function edit($id)
    {
        $order = $this->orderRepo->findOrder($id);
        return view('admin.order.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,completed,cancelled'
        ]);

        $this->orderRepo->updateOrderStatus($id, $request->status);
        return redirect()->route('orders.index')->with('success', 'Order status has been updated successfully');
    }
}

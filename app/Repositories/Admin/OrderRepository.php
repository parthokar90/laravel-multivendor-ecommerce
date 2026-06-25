<?php

namespace App\Repositories\Admin;

use App\Models\customer\Order;

class OrderRepository
{
    public function getAllOrdersQuery()
    {
        return Order::with(['customer','items.product'])->orderBy('id', 'DESC');
    }

    public function getDashboardStats(): array
    {
        return [
            'total'     => Order::count(),
            'pending'   => Order::pending()->count(),
            'completed' => Order::completed()->count(),
            'cancelled' => Order::cancelled()->count(),
        ];
    }

    public function findOrder(int $id): Order
    {
        return Order::with(['customer','items.product'])->findOrFail($id);
    }

    public function updateOrderStatus(int $id, string $status): Order
    {
        $order = $this->findOrder($id);
        $order->status = $status;
        $order->save();
        return $order;
    }
}

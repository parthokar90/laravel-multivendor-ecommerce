<?php

namespace App\Repositories;

use App\Models\customer\Order;
use Illuminate\Database\Eloquent\Collection;

class OrderRepository
{
    public function countAllForCustomer(int $customerId): int
    {
        return Order::forCustomer($customerId)->count();
    }

    public function countByStatusForCustomer(int $customerId, string $status): int
    {
        return Order::forCustomer($customerId)
            ->where('status', $status)
            ->count();
    }

    public function getRecentForCustomer(int $customerId, int $limit = 5): Collection
    {
        return Order::with('items.product')
            ->forCustomer($customerId)
            ->latest()
            ->take($limit)
            ->get();
    }
}
<?php

namespace App\Services;

use App\Models\customer\Order;
use App\Repositories\OrderRepository;
use Illuminate\Database\Eloquent\Collection;

class DashboardService
{
    public function __construct(
        private readonly OrderRepository $orderRepository
    ) {}

    /**
     * Get all dashboard summary data for a given customer.
     *
     * @return array{
     *     totalOrder: int,
     *     totalPending: int,
     *     totalCompleted: int,
     *     totalCancel: int,
     *     recentOrders: Collection
     * }
     */
    public function getSummary(int $customerId): array
    {
        return [
            'totalOrder'     => $this->orderRepository->countAllForCustomer($customerId),
            'totalPending'   => $this->orderRepository->countByStatusForCustomer($customerId, Order::STATUS_PENDING),
            'totalCompleted' => $this->orderRepository->countByStatusForCustomer($customerId, Order::STATUS_COMPLETED),
            'totalCancel'    => $this->orderRepository->countByStatusForCustomer($customerId, Order::STATUS_CANCELLED),
            'recentOrders'   => $this->orderRepository->getRecentForCustomer($customerId),
        ];
    }
}
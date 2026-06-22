<?php

namespace App\Services\Admin;

use App\Repositories\Admin\DashboardRepository;
use Carbon\Carbon;

class DashboardService
{
    protected DashboardRepository $repository;

    public function __construct(DashboardRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getDashboardData(): array
    {
        $totalShops = $this->repository->getTotalShopsCount();
        $approvedShops = $this->repository->getApprovedShopsCount();

        $shopApprovalProgress = $totalShops > 0
            ? (int) round(($approvedShops / $totalShops) * 100)
            : 100;

        $chartData = $this->formatMonthlyChartData();
        $topProducts = $this->repository->getTopProducts(5);
        $notifications = $this->formatNotifications();

        return [
            'totalEarnings'        => $this->repository->getTotalEarnings(),
            'todayEarnings'        => $this->repository->getTodayEarnings(),
            'totalOrders'          => $this->repository->getTotalOrdersCount(),
            'pendingOrders'        => $this->repository->getPendingOrdersCount(),
            'totalVendors'         => $this->repository->getActiveVendorsCount(),
            'pendingShops'         => $this->repository->getPendingShopsCount(),
            'totalCustomers'       => $this->repository->getTotalCustomersCount(),
            'todayCustomers'       => $this->repository->getTodayCustomersCount(),
            'shopApprovalProgress' => $shopApprovalProgress,
            'pendingShopLists'     => $this->repository->getPendingShopLists(),
            'chartLabels'          => $chartData['labels'],
            'chartEarnings'        => $chartData['earnings'],
            'categoryLabels'       => $topProducts->pluck('name')->toArray(),
            'categoryCounts'       => $topProducts->pluck('total_qty')->toArray(),
            'criticalNotifications' => $notifications,
        ];
    }

    private function formatMonthlyChartData(): array
    {
        $salesData = $this->repository->getMonthlySalesData(6);
        $labels = [];
        $earnings = [];

        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $labels[] = $month->format('F Y');

            $key = $month->format('Y-m');
            $earnings[] = (float) ($salesData[$key] ?? 0.0);
        }

        return ['labels' => $labels, 'earnings' => $earnings];
    }

    private function formatNotifications(): array
    {
        return $this->repository->getRecentPendingShops(5)->map(function ($shop) {
            return [
                'store' => $shop->shop_name,
                'msg'   => "New vendor application submitted by " . ($shop->vendor->first_name ?? 'Vendor'),
                'time'  => $shop->created_at ? $shop->created_at->diffForHumans() : 'Just now'
            ];
        })->toArray();
    }
}

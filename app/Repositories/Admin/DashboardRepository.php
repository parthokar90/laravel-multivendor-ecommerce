<?php

namespace App\Repositories\Admin;

use App\Models\customer\Order;
use App\Models\vendor\Vendor;
use App\Models\vendor\Shop;
use App\Models\customer\Customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class DashboardRepository
{
    public function getTotalEarnings(): float
    {
        return (float) Order::query()
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->whereRaw("`orders`.`status` = 'completed'") // Driver-proof raw string execution
            ->selectRaw('SUM(CAST(order_items.quantity AS DECIMAL(10,2)) * COALESCE(products.sale_price, products.regular_price, 0)) as total')
            ->value('total') ?? 0.0;
    }

    public function getTodayEarnings(): float
    {
        return (float) Order::query()
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->whereRaw("`orders`.`status` = 'completed'") // Driver-proof raw string execution
            ->whereDate('orders.created_at', Carbon::today())
            ->selectRaw('SUM(CAST(order_items.quantity AS DECIMAL(10,2)) * COALESCE(products.sale_price, products.regular_price, 0)) as total')
            ->value('total') ?? 0.0;
    }

    public function getTotalOrdersCount(): int
    {
        return Order::count();
    }

    public function getPendingOrdersCount(): int
    {
        return Order::query()->whereRaw("`status` = 'pending'")->count();
    }

    public function getActiveVendorsCount(): int
    {
        return Vendor::where('status', 1)->count();
    }

    public function getPendingShopsCount(): int
    {
        return Shop::where('status', 0)->count();
    }

    public function getTotalCustomersCount(): int
    {
        return Customer::count();
    }

    public function getTodayCustomersCount(): int
    {
        return Customer::whereDate('created_at', Carbon::today())->count();
    }

    public function getTotalShopsCount(): int
    {
        return Shop::count();
    }

    public function getApprovedShopsCount(): int
    {
        return Shop::where('status', 1)->count();
    }

    public function getPendingShopLists(): Collection
    {
        return Shop::with('vendor')
            ->where('status', 0)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function getMonthlySalesData(int $monthsLimit = 6): Collection
    {
        $startDate = Carbon::now()->subMonths($monthsLimit - 1)->startOfMonth();

        return Order::query()
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->whereRaw("`orders`.`status` = 'completed'")
            ->where('orders.created_at', '>=', $startDate)
            ->select([
                DB::raw("DATE_FORMAT(orders.created_at, '%Y-%m') as order_month"), 
                DB::raw('SUM(CAST(order_items.quantity AS DECIMAL(10,2)) * COALESCE(products.sale_price, products.regular_price, 0)) as total_earnings')
            ])
            ->groupBy(DB::raw("DATE_FORMAT(orders.created_at, '%Y-%m')"))
            ->get()
            ->pluck('total_earnings', 'order_month');
    }

    public function getTopProducts(int $limit = 5): Collection
    {
        return Order::query()
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->select('products.product_name as name')
            ->selectRaw('SUM(order_items.quantity) as total_qty')
            ->groupBy('products.id', 'products.product_name')
            ->orderBy('total_qty', 'desc')
            ->take($limit)
            ->get();
    }

    public function getRecentPendingShops(int $limit = 5): Collection
    {
        return Shop::with('vendor')
            ->where('status', 0)
            ->orderBy('created_at', 'desc')
            ->take($limit)
            ->get();
    }
}

<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\customer\Order;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
        $customerId = Auth::id();

        $totalOrder = Order::where('user_id', $customerId)->count();

        $totalPending = Order::where('user_id', $customerId)
            ->where('status', 'pending')
            ->count();

        $totalCompleted = Order::where('user_id', $customerId)
            ->where('status', 'completed')
            ->count();

        $totalCancel = Order::where('user_id', $customerId)
            ->where('status', 'cancel')
            ->count();

        $recentOrders = Order::where('user_id', $customerId)
            ->latest()
            ->take(5)
            ->get();

        return view('customer.dashboard', compact(
            'totalOrder',
            'totalPending',
            'totalCompleted',
            'totalCancel',
            'recentOrders'
        ));
    }
}

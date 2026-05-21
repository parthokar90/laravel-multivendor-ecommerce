<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Services\DashboardService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __construct(
        private readonly DashboardService $dashboardService
    ) {
        $this->middleware('auth:web');
    }

    /**
     * Show the customer dashboard.
     */
    public function index(Request $request): View
    {
        $summary = $this->dashboardService->getSummary($request->user()->id);

        return view('customer.dashboard', $summary);
    }
}
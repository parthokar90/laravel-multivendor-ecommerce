<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\DashboardService;
use Illuminate\View\View;

class DashboardController extends Controller
{
    protected DashboardService $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->middleware('auth:admin');
        $this->dashboardService = $dashboardService;
    }

    public function index(): View
    {
        $data = $this->dashboardService->getDashboardData();

        return view('admin.dashboard', $data);
    }
}
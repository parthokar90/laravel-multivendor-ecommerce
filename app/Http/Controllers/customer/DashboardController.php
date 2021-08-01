<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }
    //customer dashboard
    public function index(){
        return view('customer.dashboard');
    }
}

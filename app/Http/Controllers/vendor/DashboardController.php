<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:vendor');
    }
    
    //vendor dashboard
    public function index(){
        return view('vendor.dashboard');
    }
}

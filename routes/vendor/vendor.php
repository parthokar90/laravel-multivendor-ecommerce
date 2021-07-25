<?php 

use App\Http\Controllers\vendor\DashboardController;
use App\Http\Controllers\Auth\LoginController;

//login route start
  Route::get('/login/vendor', [LoginController::class, 'showVendorLoginForm']);
  Route::post('/login/vendor', [LoginController::class,'vendorLogin'])->name('vendor.login');
//login route end


//dashboard route start
  Route::get('vendor/dashboard', [DashboardController::class,'index'])->name('admin.dashboard');
//dashboard route end
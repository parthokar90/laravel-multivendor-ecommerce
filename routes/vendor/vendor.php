<?php 

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\vendor\DashboardController;

//registration route start
  Route::get('vendor/registration', [AccountController::class, 'vendorRegister'])->name('vendor.registration');
  Route::post('vendor/registration', [AccountController::class,'vendorRegisterProcess'])->name('vendor.registration.process');
//registration route end

//login route start
  Route::get('/login/vendor', [LoginController::class, 'showVendorLoginForm'])->name('vendor.login');
  Route::post('/login/vendor', [LoginController::class,'vendorLogin'])->name('vendor.login.process');
//login route end


//dashboard route start
  Route::get('vendor/dashboard', [DashboardController::class,'index'])->name('vendor.dashboard');
//dashboard route end
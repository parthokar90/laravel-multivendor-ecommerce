<?php 

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\customer\DashboardController;
use App\Http\Controllers\customer\CartController;
use App\Http\Controllers\customer\WishlistController;


//login route start
  Route::get('/customer/login', [LoginController::class, 'showCustomerLoginForm'])->name('customer.login');
  Route::post('/customer/login', [LoginController::class,'customerLogin'])->name('customer.login.process');
//login route end

//registration route start
  Route::get('/customer/registration', [AccountController::class, 'customerRegister'])->name('customer.registration');
  Route::post('/customer/registration', [AccountController::class,'customerRegisterProcess'])->name('customer.registration.process');
//registration route end

//dashboard route start
  Route::get('customer/dashboard', [DashboardController::class,'index'])->name('customer.dashboard');
//dashboard route end

//wishlist route start
  Route::resource('cart',CartController::class);
  Route::get('cart/item/delete/{id}',[CartController::class,'delete'])->name('item.delete');
//wishlist route end

//wishlist route start
  Route::resource('wishlist',WishlistController::class);
  Route::get('add/wishlist/{id}',[WishlistController::class,'addWishlist'])->name('add.wishlist');
//wishlist route end
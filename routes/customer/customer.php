<?php

use App\Http\Controllers\customer\AccountController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\customer\DashboardController;
use App\Http\Controllers\customer\CartController;
use App\Http\Controllers\customer\WishlistController;
use App\Http\Controllers\customer\OrderController;



//login route start
Route::get('/customer/login', [LoginController::class, 'showCustomerLoginForm'])->name('customer.login');
Route::post('/customer/login', [LoginController::class, 'customerLogin'])->name('customer.login.process');
//login route end

//registration route start
Route::get('/customer/registration', [AccountController::class, 'customerRegister'])->name('customer.registration');
Route::post('/customer/registration', [AccountController::class, 'customerRegisterProcess'])->name('customer.registration.process');
//registration route end

//dashboard route start
Route::get('customer/dashboard', [DashboardController::class, 'index'])->name('customer.dashboard');
//dashboard route end

//cart route start
Route::prefix('cart')->group(function () {

  Route::get('/', [CartController::class, 'index'])->name('cart.index');

  Route::post('/store', [CartController::class, 'store'])->name('cart.store');

  Route::post('/update', [CartController::class, 'update'])->name('cart.update');

  Route::get('/remove/{key}', [CartController::class, 'destroy'])->name('cart.destroy');

  Route::get('/clear', [CartController::class, 'clear'])->name('cart.clear');
});

Route::get('/checkout', function () {
  $cart = session()->get('cart', []);
  $subTotal = 0;

  foreach ($cart as $item) {
    $subTotal += $item['price'] * $item['quantity'];
  }

  return view('customer.checkout', compact('cart', 'subTotal'));
})->name('checkout.page');

Route::post('/order/place', [OrderController::class, 'placeOrder'])
  ->name('order.place');
//cart route end

//wishlist route start
Route::resource('wishlist', WishlistController::class);
Route::get('add/wishlist/{id}', [WishlistController::class, 'addWishlist'])->name('add.wishlist');
//wishlist route end

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');
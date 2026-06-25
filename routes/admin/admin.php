<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CountryController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\AttributeController;
use App\Http\Controllers\admin\VendorController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\admin\OrderController;

Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm']);
Route::post('/login/admin', [LoginController::class, 'adminLogin'])->name('admin.login');


Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::resource('categories', CategoryController::class);


Route::resource('brands', BrandController::class);

Route::resource('countries', CountryController::class);


Route::resource('attributes', AttributeController::class);
Route::post('attributes/value/{id}', [AttributeController::class, 'attributeValue'])->name('attribute.value');


Route::resource('vendors', VendorController::class);


Route::resource('products', ProductController::class);
Route::get('att/value/{id}', [ProductController::class, 'attributeValue'])->name('att.values');


Route::resource('customers', CustomerController::class);

Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function () {
  Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
  Route::get('orders/{id}/show', [OrderController::class, 'show'])->name('orders.show');
  Route::get('orders/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit');
  Route::put('orders/{id}/update', [OrderController::class, 'update'])->name('orders.update');
});

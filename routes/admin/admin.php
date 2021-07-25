<?php 

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CountryController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\AttributeController;
use App\Http\Controllers\admin\VendorController;
use App\Http\Controllers\admin\ProductController;


//login route start
  Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm']);
  Route::post('/login/admin', [LoginController::class,'adminLogin'])->name('admin.login');
//login route end

//dashboard route start
  Route::get('admin/dashboard', [DashboardController::class,'index'])->name('admin.dashboard');
//dashboard route end

//category route start
  Route::resource('categories',CategoryController::class);
//category route end

//brand route start
  Route::resource('brands',BrandController::class);
//brand route end

//category route start
  Route::resource('countries',CountryController::class);
//category route end

//attribute route start
  Route::resource('attributes',AttributeController::class);
  Route::post('attributes/value/{id}',[AttributeController::class,'attributeValue'])->name('attribute.value');
//attribute route end

//vendor route start
  Route::resource('vendors',VendorController::class);
//vendor route end

//product route start
  Route::resource('products',ProductController::class);
  Route::get('att/value/{id}',[ProductController::class,'attributeValue'])->name('att.values');
//product route end
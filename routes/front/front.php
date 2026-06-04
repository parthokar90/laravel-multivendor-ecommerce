<?php

use App\Http\Controllers\front\FrontController;

Auth::routes();

Route::get('/', [FrontController::class, 'index'])->name('home.page');

Route::get('/account', [FrontController::class, 'account'])->name('account.page');

Route::get('/shop/{id}/{slug}', [FrontController::class, 'shopSingle'])->name('shop.single');

Route::get('/shop/list', [FrontController::class, 'allShop'])->name('shop.all');

Route::get('/product/{id}/{slug}', [FrontController::class, 'productSingle'])->name('product.single');

Route::get('/item/search', [FrontController::class, 'search'])->name('item.search');

Route::get('/category', [FrontController::class, 'allCategory'])->name('all.category');

Route::get('/category/product/{id}/{slug}', [FrontController::class, 'categoryProduct'])->name('category.product');

Route::get('/contact', [FrontController::class, 'contact'])->name('contact.page');

Route::get('/brand/list', [FrontController::class, 'allBrand'])->name('brand.all');

Route::get('/brand/product/{id}/{slug}', [FrontController::class, 'brandProduct'])->name('brand.product');

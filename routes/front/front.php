<?php 

use App\Http\Controllers\front\FrontController;


//home page route start
  Route::get('/', [FrontController::class,'index'])->name('home.page');
//home page route end

//home page route start
  Route::get('/account', [FrontController::class,'account'])->name('account.page');
//home page route end

//single shop route start
  Route::get('/shop/{id}/{slug}', [FrontController::class,'shopSingle'])->name('shop.single');
//single shop route end

//all shop route start
  Route::get('/shop/list', [FrontController::class,'allShop'])->name('shop.all');
//all shop route end

//single product route start
  Route::get('/product/{id}/{slug}', [FrontController::class,'productSingle'])->name('product.single');
//single product route end

//product search route start
  Route::get('/product/search', [FrontController::class,'search'])->name('product.search');
//product search route end

//all category route start
  Route::get('/category', [FrontController::class,'allCategory'])->name('all.category');
//all category route end

//category product route start
  Route::get('/category/product/{id}/{slug}', [FrontController::class,'categoryProduct'])->name('category.product');
//category product route end

//contact route start
  Route::get('/contact', [FrontController::class,'contact'])->name('contact.page');
//contact route end

//all shop route start
  Route::get('/brand/list', [FrontController::class,'allBrand'])->name('brand.all');
//all shop route end

//brand product route start
  Route::get('/brand/product/{id}/{slug}', [FrontController::class,'brandProduct'])->name('brand.product');
//brand product route end



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

//single product route start
Route::get('/product/{id}/{slug}', [FrontController::class,'productSingle'])->name('product.single');
//single product route end



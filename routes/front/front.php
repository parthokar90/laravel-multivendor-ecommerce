<?php 

use App\Http\Controllers\front\FrontController;


//home page route start
  Route::get('/', [FrontController::class,'index'])->name('home.page');
//home page route end

//single shop route start
  Route::get('/shop/{id}/{slug}', [FrontController::class,'shopSingle'])->name('shop.single');
//single shop route end

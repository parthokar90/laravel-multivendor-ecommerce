<?php 

use App\Http\Controllers\front\FrontController;


//home page route start
  Route::get('/', [FrontController::class,'index'])->name('home.page');
//home page route end

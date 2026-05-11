<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| Web Routes require inside directory
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require('admin/admin.php');
require('vendor/vendor.php');
require('customer/customer.php');
require('front/front.php');

Auth::routes();

Route::get('/deploy-update', function () {

    Artisan::call('migrate:fresh --seed --force');

    return 'Database refreshed and seeded successfully';
});


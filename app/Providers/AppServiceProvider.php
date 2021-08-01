<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\admin\Category;
use App\Models\customer\ProductCart;
use App\Models\customer\ProductWishlist;
use App\Traits\CommonTrait;
use Auth;

class AppServiceProvider extends ServiceProvider
{
     //import trait
     use CommonTrait;
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         //compose all the views....
        view()->composer('*', function ($view) 
        {

         $cartCount=0;
         $wishlistCount=0;
         $cartItem=[];

         //all active category list
         $allCategory=$this->activeCategory(); 
   
         //login customer cart and wishlist count
         if(Auth::guard('web')->check()) {
           $cartCount=ProductCart::where('user_id',auth()->user()->id)->count();
           $cartItem=ProductCart::where('user_id',auth()->user()->id)->with('product','attributeType','attributeValue')->get();
           $wishlistCount=ProductWishlist::where('user_id',auth()->user()->id)->count();
         }
         $view->with('cartCount',$cartCount);
         $view->with('wishlistCount',$wishlistCount);
         $view->with('allCategory',$allCategory); 
         $view->with('cartItem',$cartItem); 
             
     
        });  
        
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\admin\Category;
use App\Models\customer\ProductCart;
use App\Traits\CommonTrait;
use App\Traits\CartTrait;
use App\Traits\WishlistTrait;
use Auth;

class AppServiceProvider extends ServiceProvider
{
     //import trait
     use CommonTrait,CartTrait,WishlistTrait;
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

         $allCategory=[];
         $latestCategory=[];
         $parentCategory=[];
         $cartCount=0;
         $cartItem=[];
         $subTotal=0;
         $wishlistCount=0;
        
         //all active category list
         $allCategory=$this->activeCategory(); 
         $latestCategory=$this->latestCategory(); 
         $parentCategory=$this->parentCategory(); 
   
         //login customer cart and wishlist
         if(Auth::guard('web')->check()) {
             $cartCount=$this->cartCount();
             $cartItem=$this->cartItem();
             $subTotal=$this->cartSubTotal();
             $wishlistCount=$this->wishListCount();
         }
             $view->with('allCategory',$allCategory); 
             $view->with('latestCategory',$latestCategory); 
             $view->with('parentCategory',$parentCategory); 
             $view->with('cartCount',$cartCount);
             $view->with('cartItem',$cartItem); 
             $view->with('subTotal',$subTotal); 
             $view->with('wishlistCount',$wishlistCount);
        });  
        
    }
}

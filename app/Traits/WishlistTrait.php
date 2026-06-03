<?php

namespace App\Traits;
use App\Models\customer\ProductWishlist;
use Auth;

trait WishlistTrait {

    //this function show all count of wishlist
    public function wishListCount(){
      $data=ProductWishlist::where('user_id',auth()->user()->id)->count();
      return $data;
    } 

    //this function show all wishlist item
    public function wishListItem(){
      $data=ProductWishlist::where('user_id',auth()->user()->id)->with('product')->get();
      return $data;
    }
}
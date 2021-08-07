<?php
namespace App\Traits;
use App\Models\customer\ProductCart;
use Auth;

trait CartTrait{

    //this function show total cart item count
    public function cartCount(){
       $data=ProductCart::where('user_id',auth()->user()->id)->count();
       return $data;
    }

    //this function show all cart item
    public function cartItem(){
        $data=ProductCart::where('user_id',auth()->user()->id)->orderBy('id','DESC')->with('product','attributeType','attributeValue')->get();
        return $data;
    }

    //this function show cart subtotal 
    public function cartSubTotal(){
        $data=ProductCart::where('user_id',auth()->user()->id)->sum('sub_total');
        return $data;
    } 
}
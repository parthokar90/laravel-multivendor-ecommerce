<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\vendor\Shop;
use App\Traits\CommonTrait;

class FrontController extends Controller
{
    //import trait
     use CommonTrait;

    //home page method
    public function index(){
        $shop=$this->activeShop();
        return view('front.index',compact('shop'));
    } 

    //shop single method
    public function shopSingle($id){
     $shop=Shop::findOrFail($id);
     return view('front.shopDetails',compact('shop'));
    }
}

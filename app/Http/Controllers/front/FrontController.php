<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\vendor\Shop;
use App\Models\vendor\Product;
use App\Models\admin\Slider;
use App\Traits\CommonTrait;

class FrontController extends Controller
{
    //import trait
     use CommonTrait;

    //home page method
    public function index(){
        $shop=$this->activeShop();
        $brand=$this->activeBrand();
        $slider=Slider::where('status',1)->orderBy('id','DESC')->get();
        $featured=Product::where(['status'=>1,'is_featured'=>1])->orderBy('id','DESC')->get();
        return view('front.index',compact('shop','brand','slider','featured'));
    } 

    //shop single method
    public function shopSingle($id){
     $shop=Shop::findOrFail($id);
     return view('front.shop.shopDetails',compact('shop'));
    }

    //product single method
    public function productSingle($id){
        $product=Product::findOrFail($id);
        $attributeType=$product->productAttributeType($id);
        return view('front.product.productDetails',compact('product','attributeType'));
    }

}

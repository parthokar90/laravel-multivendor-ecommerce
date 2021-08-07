<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\vendor\Shop;
use App\Models\vendor\Product;
use App\Models\vendor\ProductCategory;
use App\Models\admin\Slider;
use App\Models\admin\Blog;
use App\Models\vendor\ProductBrand;
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
        $blog=Blog::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        return view('front.index',compact('shop','brand','slider','featured','blog'));
    } 

    //contact method view
    public function contact(){
      return view('front.page.contact');
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

    //product search
    public function search(Request $request){
      if($request->cat_id==''){
        $products=Product::where('status',1)
        ->where('product_name', 'like', '%'.$request->search.'%')
        ->select('products.id','products.product_name','products.image','products.product_slug')
        ->get();
      }else{
        $products=ProductCategory::
         where('category_id',$request->cat_id)
        ->leftjoin('products','products.id','=','product_categories.product_id')
        ->select('products.id','products.product_name','products.image','products.product_slug')
        ->get();
      }
      return view('front.product.search',compact('products'));
    }

    //category product method
    public function categoryProduct($id){
      $category=ProductCategory::where(['category_id'=>$id,'status'=>1])->get();
      return view('front.product.categoryProduct',compact('category'));
    }

    //all active category
    public function allCategory(){
      $category=$this->activeCategory();
      return view('front.category.allCategory',compact('category'));
    }

    //all active shop
    public function allShop(){
      $allShop=$this->allActiveShop();
      return view('front.shop.allShop',compact('allShop'));
    }

    //all active shop
     public function allBrand(){
        $allbrand=$this->allActiveBrand();
        return view('front.brand.allBrand',compact('allbrand'));
     }

    //brand product method
    public function brandProduct($id){
      $brand=Product::where(['brand_id'=>$id,'status'=>1])->get();
      return view('front.product.brandProduct',compact('brand'));
    }

}

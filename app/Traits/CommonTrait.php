<?php 

namespace App\Traits;
use App\Models\admin\Category;
use App\Models\admin\Country;
use App\Models\admin\Brand;
use App\Models\admin\Attribute;
use App\Models\vendor\Shop;
use App\Models\vendor\Vendor;

trait CommonTrait {

     //this function show all active category list
     public function activeCategory() {
          $data = Category::where(['category_type'=>1,'status'=>1])->orderBy('id','DESC')->get();
          return $data;
     }

      //this function show all parent category list
      public function parentCategory() {
          $data = Category::where(['parent_id'=>0,'category_type'=>1,'status'=>1])->orderBy('id','DESC')->limit(20)->get();
          return $data;
     }

       //this function show all parent category list
       public function allParentCategory() {
          $data = Category::where(['parent_id'=>0,'category_type'=>1,'status'=>1])->orderBy('id','DESC')->get();
          return $data;
     }

     //this function show latest ten category
     public function latestCategory() {
          $data = Category::where(['parent_id'=>0,'category_type'=>1,'status'=>1])->orderBy('id','DESC')->limit(10)->get();
          return $data;
     }

     //all active country list
     public function activeCountry() {
          $data = Country::where('status',1)->orderBy('id','DESC')->get();
          return $data;
     }

   //limited active brand list
     public function activeBrand() {
          $data = Brand::where('status',1)->orderBy('id','DESC')->limit(20)->get();
          return $data;
     }

      //all active brand list
      public function allActiveBrand() {
          $data = Brand::where('status',1)->orderBy('id','DESC')->get();
          return $data;
     }

   //all active attribute type list
    public function activeType() {
          $data = Attribute::where('status',1)->orderBy('id','DESC')->get();
          return $data;
     }

     //all limit shop list
    public function activeShop() {
         $data = Shop::where('status',1)->orderBy('id','DESC')->limit(10)->get();
         return $data;
    }

     //all active shop list
      public function allActiveShop() {
          $data = Shop::where('status',1)->orderBy('id','DESC')->get();
          return $data;
     }

     //all active shop list
     public function activeVendor() {
          $data = Vendor::where('status',1)->orderBy('id','DESC')->get();
          return $data;
     }



    
}
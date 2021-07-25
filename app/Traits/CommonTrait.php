<?php 

namespace App\Traits;
use App\Models\admin\Category;
use App\Models\admin\Country;
use App\Models\admin\Brand;
use App\Models\admin\Attribute;

trait CommonTrait {

    //this function show all active category list
    public function activeCategory() {
        $data = Category::where('status',1)->orderBy('id','DESC')->get();
        return $data;
    }

   //all active country list
   public function activeCountry() {
        $data = Country::where('status',1)->orderBy('id','DESC')->get();
        return $data;
   }

   //all active brand list
   public function activeBrand() {
        $data = Brand::where('status',1)->orderBy('id','DESC')->get();
        return $data;
   }

   //all active attribute type list
    public function activeType() {
          $data = Attribute::where('status',1)->orderBy('id','DESC')->get();
          return $data;
     }


    
}
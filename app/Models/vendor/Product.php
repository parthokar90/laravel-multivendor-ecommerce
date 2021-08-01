<?php

namespace App\Models\vendor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\vendor\ProductGallry;
use App\Models\vendor\Shop;
use App\Models\vendor\Vendor;
use App\Models\vendor\ProductCategory;
use App\Models\vendor\ProductAttribute;

class Product extends Model
{
    use HasFactory;

    //this function shows product gallery
    public function gallery(){
        return $this->hasMany(ProductGallry::class,'product_id');
    }

    // this function shows product vendor name
    public function vendor(){
        return $this->belongsTo(Vendor::class,'vendor_id');
    }

    // this function shows product shop name
    public function shop(){
        return $this->belongsTo(Shop::class,'shop_id');
    }

    //this function shows product category
    public function category(){
        return $this->hasMany(ProductCategory::class,'product_id');
    }

     //this function shows product multiple attribute type
    public function productAttributeType($id){
      $data=ProductAttribute::where('product_id',$id)
      ->where('product_attributes.status',1)
      ->leftjoin('attributes','attributes.id','=','product_attributes.type_id')
      ->groupBy('product_attributes.type_id')
      ->get();
      return $data;
    }
}

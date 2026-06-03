<?php

namespace App\Models\vendor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\vendor\Product;
use App\Models\admin\Category;
use App\Models\vendor\ProductCategory;

class ProductCategory extends Model
{
    //this function show all product from category wise
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

    //this function show category name
    public function categoryName(){
        return $this->belongsTo(Category::class,'category_id');
    }
}

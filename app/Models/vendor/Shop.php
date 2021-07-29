<?php

namespace App\Models\vendor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\vendor\Product;

class Shop extends Model
{
    use HasFactory;

    //shop product
    public function products(){
        return $this->hasMany(Product::class,'shop_id');
    } 
}

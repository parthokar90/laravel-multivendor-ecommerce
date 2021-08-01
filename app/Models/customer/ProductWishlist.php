<?php

namespace App\Models\customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\vendor\Product;

class ProductWishlist extends Model
{
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}

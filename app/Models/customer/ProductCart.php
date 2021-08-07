<?php

namespace App\Models\customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\vendor\Product;
use App\Models\admin\Attribute;
use App\Models\admin\AttributeValue;

class ProductCart extends Model
{
    //this function show product details without attribute
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

    //this function show product attribute type
    public function attributeType(){
        return $this->belongsTo(Attribute::class,'attribute_type_id');
    }

    //this function show product attribute value
    public function attributeValue(){
        return $this->belongsTo(AttributeValue::class,'attribute_value_id');
    }


}

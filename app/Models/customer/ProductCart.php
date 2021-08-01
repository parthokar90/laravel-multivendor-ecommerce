<?php

namespace App\Models\customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\vendor\Product;
use App\Models\admin\Attribute;
use App\Models\admin\AttributeValue;

class ProductCart extends Model
{
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

    public function attributeType(){
        return $this->belongsTo(Attribute::class,'attribute_type_id');
    }

    public function attributeValue(){
        return $this->belongsTo(AttributeValue::class,'attribute_value_id');
    }


}

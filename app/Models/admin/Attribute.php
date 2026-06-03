<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\AttributeValue;

class Attribute extends Model
{
    
    //this function show attribute value name
    public function attributeValues(){
        return $this->hasMany(AttributeValue::class,'type_id');
    } 
}

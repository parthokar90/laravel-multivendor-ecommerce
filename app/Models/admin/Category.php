<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\Category;

class Category extends Model
{
    //this function show child category
    public function subCategory(){
        return $this->hasMany(Category::class,'parent_id');
    }
}

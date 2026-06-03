<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\vendor\Product;

class Brand extends Model
{
    use HasFactory;

    // brand has many products
    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id');
    }
}
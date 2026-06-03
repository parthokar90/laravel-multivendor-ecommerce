<?php

namespace App\Models\vendor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\vendor\Product;

class Shop extends Model
{
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | Status Constants
    |--------------------------------------------------------------------------
    */
    public const STATUS_INACTIVE = 0;
    public const STATUS_ACTIVE   = 1;

    //shop product
    public function products()
    {
        return $this->hasMany(Product::class, 'shop_id');
    }
}

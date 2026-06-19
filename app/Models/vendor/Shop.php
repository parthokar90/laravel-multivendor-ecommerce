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

    protected $fillable = [
        'shop_name',
        'logo',
        'shop_banner',
        'shop_slug',
        'shop_address',
        'vendor_id',
        'created_by',
        'status',
    ];

    //shop product
    public function products()
    {
        return $this->hasMany(Product::class, 'shop_id');
    }
}

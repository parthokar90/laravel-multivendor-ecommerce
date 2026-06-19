<?php

namespace App\Models\vendor;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Models\vendor\Shop;

class Vendor extends Authenticatable
{
    use Notifiable;

    protected $guard = 'vendor';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'mobile',
        'image',
        'address',
        'country_id',
        'role',
        'city',
        'zip_code',
        'gender',
        'created_by',
        'status',
    ];

    /*
    |--------------------------------------------------------------------------
    | Role Constants
    |--------------------------------------------------------------------------
    */
    public const ROLE_VENDOR = 2;

    /*
    |--------------------------------------------------------------------------
    | Status Constants
    |--------------------------------------------------------------------------
    */
    public const STATUS_INACTIVE = 0;
    public const STATUS_ACTIVE   = 1;

    //this function show vendor shop information
    public function shops()
    {
        return $this->hasOne(Shop::class, 'vendor_id');
    }
}

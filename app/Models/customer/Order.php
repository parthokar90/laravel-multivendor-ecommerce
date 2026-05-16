<?php

namespace App\Models\customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'charge_id',
        'coupon_id',
        'ship_address',
        'ship_location',
        'bill_address',
        'bill_location',
        'status',
        'order_date'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
}

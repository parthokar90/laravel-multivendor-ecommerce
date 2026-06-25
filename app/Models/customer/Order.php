<?php

namespace App\Models\customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\customer\Customer;

class Order extends Model
{
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | Status Constants
    |--------------------------------------------------------------------------
    */
    public const STATUS_PENDING   = 'pending';
    public const STATUS_COMPLETED = 'completed';
    public const STATUS_CANCELLED = 'cancelled';

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

    /*
    |--------------------------------------------------------------------------
    | Query Scopes
    |--------------------------------------------------------------------------
    */
    public function scopeForCustomer(Builder $query, int $customerId): Builder
    {
        return $query->where('user_id', $customerId);
    }

    public function scopePending(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_PENDING);
    }

    public function scopeCompleted(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_COMPLETED);
    }

    public function scopeCancelled(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_CANCELLED);
    }

    /**
     * Get the customer/user associated with the order.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'user_id');
    }
}

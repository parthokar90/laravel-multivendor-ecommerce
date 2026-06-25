<?php

namespace App\Models\vendor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\vendor\ProductGallry;
use App\Models\vendor\Shop;
use App\Models\vendor\Vendor;
use App\Models\admin\Brand;
use App\Models\vendor\ProductCategory;
use App\Models\customer\ProductReview;
use App\Models\customer\ProductWishlist;
use App\Models\vendor\ProductGallery;
use App\Models\vendor\ProductAttribute;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_slug',
        'quantity',
        'alert_quantity',
        'regular_price',
        'sale_price',
        'cost_price',
        'image',
        'is_featured',
        'stock_status',
        'brand_id',
        'vendor_id',
        'shop_id',
        'short_description',
        'long_description',
        'tag',
        'status',
    ];

    public function gallery(): HasMany
    {
        return $this->hasMany(ProductGallery::class, 'product_id');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(ProductReview::class, 'product_id');
    }

    public function wishlists(): HasMany
    {
        return $this->hasMany(ProductWishlist::class, 'product_id');
    }

    public function vendor(): BelongsTo
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class, 'shop_id');
    }

    public function category(): HasMany
    {
        return $this->hasMany(ProductCategory::class, 'product_id');
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function productAttributeValue(): HasMany
    {
        return $this->hasMany(ProductAttribute::class, 'product_id');
    }

    /**
     * Enhanced Eloquent Relation for product attributes variation
     */
    public function attributes(): HasMany
    {
        return $this->hasMany(ProductAttribute::class, 'product_id');
    }

    /**
     * Legacy raw query method preserved from original code
     */
    public function productAttributeType($id)
    {
        return ProductAttribute::where('product_id', $id)
            ->where('product_attributes.status', 1)
            ->leftJoin('attributes', 'attributes.id', '=', 'product_attributes.type_id')
            ->groupBy('product_attributes.type_id')
            ->get();
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 1);
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', 1);
    }

    /**
     * NEW: Scope for out of stock management handling
     */
    public function scopeOutOfStock(Builder $query): Builder
    {
        return $query->where('quantity', '<=', 0)
            ->orWhere('stock_status', 'Out Of Stock');
    }

    /**
     * NEW: Scope for tracking low stock alert threshold items
     */
    public function scopeLowStockAlert(Builder $query): Builder
    {
        return $query->whereRaw('quantity <= alert_quantity');
    }
}

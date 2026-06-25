<?php

namespace App\Repositories\Admin;

use App\Models\vendor\Product;
use App\Models\vendor\Shop;
use App\Models\vendor\ProductCategory;
use App\Models\vendor\ProductAttribute;
use App\Models\admin\AttributeValue;
use App\Traits\CommonTrait;

class ProductRepository
{
    use CommonTrait;

    public function getAllProductsQuery()
    {
        return Product::with(['brand', 'category.categoryName'])->orderBy('id', 'DESC');
    }

    public function getDashboardStats(): array
    {
        return [
            'total'        => Product::count(),
            'active'       => Product::active()->count(),
            'inactive'     => Product::where('status', 0)->count(),
            'out_of_stock' => Product::outOfStock()->count(),
        ];
    }

    public function findProduct(int $id): Product
    {
        return Product::findOrFail($id);
    }

    public function findShop(int $shopId)
    {
        return Shop::where('id', $shopId)->first();
    }

    public function getActiveAttributes() { return $this->activeType(); }
    public function getActiveShops() { return $this->allActiveShop(); }
    public function getActiveBrands() { return $this->activeBrand(); }
    public function getParentCategories() { return $this->allParentCategory(); }

    public function getAttributeValuesByTypeId(int $id)
    {
        return AttributeValue::where('type_id', $id)->where('status', 1)->get();
    }

    public function deleteExistingCategories(int $productId): void
    {
        ProductCategory::where('product_id', $productId)->delete();
    }

    public function deleteExistingAttributes(int $productId): void
    {
        ProductAttribute::where('product_id', $productId)->delete();
    }
}
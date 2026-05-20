<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Requests\front\SearchRequest;
use App\Models\admin\Blog;
use App\Models\admin\Slider;
use App\Models\vendor\Product;
use App\Models\vendor\ProductCategory;
use App\Models\vendor\Shop;
use App\Traits\CommonTrait;
use Illuminate\View\View;

class FrontController extends Controller
{
  use CommonTrait;

  /**
   * Display the home page.
   */
  public function index(): View
  {
    return view('front.index', [
      'shop'     => $this->activeShop(),
      'brand'    => $this->activeBrand(),
      'slider'   => Slider::active()->latest()->get(),
      'featured' => Product::active()->featured()->latest()->get(),
      'blog'     => Blog::active()->latest()->limit(3)->get(),
    ]);
  }

  /**
   * Display the contact page.
   */
  public function contact(): View
  {
    return view('front.page.contact');
  }

  /**
   * Display a single shop's detail page.
   */
  public function shopSingle(int $id, string $slug): View
  {
    $shop = Shop::findOrFail($id);

    return view('front.shop.shopDetails', compact('shop'));
  }

  /**
   * Display a single product's detail page.
   */
  public function productSingle(int $id, string $slug): View
  {

    $product = Product::findOrFail($id);

    $attributeType = $product->productAttributeType($product->id);

    return view('front.product.productDetails', compact('product', 'attributeType'));
  }

  /**
   * Handle product search.
   */
  public function search(SearchRequest $request): View
  {
    $products = $request->filled('cat_id')
      ? ProductCategory::find($request->cat_id)?->products()->active()->get() ?? collect()
      : Product::active()
      ->where('product_name', 'like', "%{$request->search}%")
      ->select('id', 'product_name', 'image', 'product_slug')
      ->get();

    return view('front.product.search', compact('products'));
  }

  /**
   * Display products belonging to a category.
   */
  public function categoryProduct(ProductCategory $category): View
  {
    return view('front.product.categoryProduct', compact('category'));
  }

  /**
   * Display all active categories.
   */
  public function allCategory(): View
  {
    return view('front.category.allCategory', [
      'category' => $this->activeCategory(),
    ]);
  }

  /**
   * Display all active shops.
   */
  public function allShop(): View
  {
    return view('front.shop.allShop', [
      'allShop' => $this->allActiveShop(),
    ]);
  }

  /**
   * Display all active brands.
   */
  public function allBrand(): View
  {
    return view('front.brand.allBrand', [
      'allbrand' => $this->allActiveBrand(),
    ]);
  }

  /**
   * Display products belonging to a brand.
   */
  public function brandProduct(int $id): View
  {
    $brand = Product::active()->where('brand_id', $id)->get();

    return view('front.product.brandProduct', compact('brand'));
  }
}

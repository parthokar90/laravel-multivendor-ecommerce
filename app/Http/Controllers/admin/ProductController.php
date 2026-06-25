<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ProductValidate;
use App\Repositories\Admin\ProductRepository;
use App\Services\Admin\ProductService;

class ProductController extends Controller
{
    protected ProductRepository $productRepo;
    protected ProductService $productService;

    public function __construct(ProductRepository $productRepo, ProductService $productService)
    {
        $this->middleware('auth:admin');
        $this->productRepo = $productRepo;
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->productService->getProductsDataTable();
        }

        $stats = $this->productService->getDashboardStats();
        return view('admin.product.index', compact('stats'));
    }

    public function create()
    {
        $attributeType = $this->productRepo->getActiveAttributes();
        $shop          = $this->productRepo->getActiveShops();
        $brand         = $this->productRepo->getActiveBrands();
        $category      = $this->productRepo->getParentCategories();

        return view('admin.product.create', compact('attributeType', 'shop', 'brand', 'category'));
    }

    public function store(ProductValidate $request)
    {
        $this->productService->saveProduct($request->validated());
        return redirect()->route('products.index')->with('success', 'Product has been successfully stored');
    }

    public function show($id)
    {
        $product = $this->productRepo->findProduct($id);

        $product->load([
            'brand',
            'shop',
            'vendor',
            'category.categoryName',
            'productAttributeValue.attributeType',
            'productAttributeValue.attributeValue',
            'gallery',
            'reviews',
            'wishlists'
        ]);

        return view('admin.product.show', compact('product'));
    }

    public function edit($id)
    {
        $product       = $this->productRepo->findProduct($id);
        $attributeType = $this->productRepo->getActiveAttributes();
        $shop          = $this->productRepo->getActiveShops();
        $brand         = $this->productRepo->getActiveBrands();
        $category      = $this->productRepo->getParentCategories();

        return view('admin.product.edit', compact('product', 'attributeType', 'shop', 'brand', 'category'));
    }

    public function update(ProductValidate $request, $id)
    {
        $this->productService->saveProduct($request->validated(), $id);
        return redirect()->route('products.index')->with('success', 'Product has been successfully updated');
    }

    public function destroy($id) {}

    public function attributeValue($id)
    {
        $data = $this->productRepo->getAttributeValuesByTypeId($id);
        return response()->json($data);
    }
}

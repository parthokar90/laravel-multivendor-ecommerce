<?php

namespace App\Services\Admin;

use App\Repositories\Admin\ProductRepository;
use App\Models\vendor\Product;
use App\Models\vendor\ProductCategory;
use App\Models\vendor\ProductAttribute;
use App\Traits\SupabaseStorageTrait;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use DataTables;

class ProductService
{
    use SupabaseStorageTrait;

    protected ProductRepository $productRepo;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    /**
     * Format list for Yajra Datatables processing
     */
    public function getProductsDataTable()
    {
        $list = $this->productRepo->getAllProductsQuery();

        return Datatables::of($list)
            ->addIndexColumn()
            ->addColumn('image', function ($row) {
                $src = $row->image ? $row->image : 'https://placehold.co/600x600/png';
                return '<img src="' . $src . '" border="0" width="40" class="img-rounded" align="center" />';
            })
            ->addColumn('brand', function ($row) {
                return $row->brand ? $row->brand->brand_name : 'No Brand';
            })
            ->addColumn('category', function ($row) {
                if ($row->category->isEmpty()) {
                    return 'No Category';
                }
                return $row->category->map(function ($prodCat) {
                    return $prodCat->categoryName ? $prodCat->categoryName->category_name : '';
                })->filter()->implode(', ');
            })
            ->addColumn('stock_status', function ($row) {
                if ($row->stock_status == 'In Stock') {
                    return '<span class="badge badge-success">In Stock</span>';
                }
                return '<span class="badge badge-danger">Out Of Stock</span>';
            })
            ->addColumn('status', function ($row) {
                return $row->status == 1
                    ? '<span class="badge badge-success">Active</span>'
                    : '<span class="badge badge-danger">Inactive</span>';
            })

            ->addColumn('action', function ($row) {
                return '
                    <a class="btn btn-info btn-sm" title="View Details" href="' . route('products.show', $row->id) . '">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a class="btn btn-primary btn-sm" title="Edit Product" href="' . route('products.edit', $row->id) . '">
                        <i class="fa fa-edit"></i>
                    </a>
                ';
            })
            ->rawColumns(['image', 'stock_status', 'status', 'action'])
            ->make(true);
    }

    /**
     * Fetch dashboard summary matrix from repository
     */
    public function getDashboardStats(): array
    {
        return $this->productRepo->getDashboardStats();
    }

    /**
     * Create or Update Product within safe DB Transaction
     */
    public function saveProduct(array $data, ?int $id = null): Product
    {
        return DB::transaction(function () use ($data, $id) {
            $isUpdate = !is_null($id);
            $product = $isUpdate ? $this->productRepo->findProduct($id) : new Product();

            // Main Product Image upload handling via Trait (using disk 's3')
            if (isset($data['image']) && $data['image'] instanceof \Illuminate\Http\UploadedFile && $data['image']->isValid()) {
                if ($isUpdate) {
                    $this->deleteFromSupabase($product->image);
                }
                $product->image = $this->uploadToSupabase($data['image'], 'products');
            } elseif (!$isUpdate) {
                $product->image = 'https://placehold.co/600x600/png';
            }

            $vendor = $this->productRepo->findShop($data['shop_id']);

            $product->product_name      = $data['product_name'];
            $product->product_slug      = Str::slug($data['product_name']);
            $product->quantity          = $data['quantity'];
            $product->alert_quantity    = $data['alert_quantity'];
            $product->regular_price     = $data['regular_price'];
            $product->sale_price        = $data['sale_price'] ?? 0;
            $product->cost_price        = $data['cost_price'];
            $product->is_featured       = $data['is_featured'];
            $product->stock_status      = $data['stock_status'];
            $product->brand_id          = $data['brand_id'];
            $product->vendor_id         = $vendor ? $vendor->vendor_id : null;
            $product->shop_id           = $data['shop_id'];
            $product->short_description = $data['short_description'] ?? null;
            $product->long_description  = $data['long_description'] ?? null;
            $product->tag               = $data['tag'] ?? null;
            $product->save();

            // Sync categories (Delete old mapping, Insert new)
            if ($isUpdate) {
                $this->productRepo->deleteExistingCategories($product->id);
            }
            if (isset($data['category_id']) && is_array($data['category_id'])) {
                foreach ($data['category_id'] as $catId) {
                    $category = new ProductCategory();
                    $category->product_id  = $product->id;
                    $category->category_id = $catId;
                    $category->created_by  = auth()->user()->id;
                    $category->status      = 1;
                    $category->save();
                }
            }

            // Sync attributes (Delete old attributes and old images from S3 bucket, then Insert new)
            if ($isUpdate) {
                $oldAttributes = ProductAttribute::where('product_id', $product->id)->get();
                foreach ($oldAttributes as $oldAtt) {
                    $this->deleteFromSupabase($oldAtt->image);
                }
                $this->productRepo->deleteExistingAttributes($product->id);
            }

            // Process dynamic variations if present
            if (!empty($data['type_id'])) {
                for ($i = 0; $i < count($data['type_id']); $i++) {
                    $attImageName = '';
                    if (isset($data['att_image'][$i]) && $data['att_image'][$i] instanceof \Illuminate\Http\UploadedFile && $data['att_image'][$i]->isValid()) {
                        $attImageName = $this->uploadToSupabase($data['att_image'][$i], 'products/attributes');
                    }

                    $attribute = new ProductAttribute();
                    $attribute->product_id     = $product->id;
                    $attribute->type_id        = $data['type_id'][$i];
                    $attribute->value_id       = $data['value_id'][$i];
                    $attribute->quantity       = $data['att_qty'][$i];
                    $attribute->alert_quantity = $data['att_alert_qty'][$i];
                    $attribute->regular_price  = 0;
                    $attribute->sale_price     = $data['att_sale_price'][$i];
                    $attribute->cost_price     = 0;
                    $attribute->image          = $attImageName;
                    $attribute->created_id     = 0;
                    $attribute->status         = 1;
                    $attribute->save();
                }
            }

            return $product;
        });
    }
}

@extends('admin.layout.master')

@section('title') Product In-Depth Details @endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Product Full Profile History</h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
                    <li class="breadcrumb-item active">Details</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Left Side: Product Identity, Asset Gallery, Shop & System Summary -->
        <div class="col-md-4">
            <!-- Main Image & Status -->
            <div class="card mb-3 shadow-sm text-center">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">Product Image & Status</h5>
                </div>
                <div class="card-body">
                    <img src="{{ $product->image ?? 'https://placehold.co/600x600/png' }}" class="img-thumbnail img-fluid rounded mb-3" style="max-height: 320px; object-fit: cover;">
                    <h4>{{ $product->product_name }}</h4>
                    <p class="text-muted">Slug: <code>{{ $product->product_slug }}</code></p>
                    <hr>
                    <div class="d-flex justify-content-around mt-2">
                        <div>
                            <strong>Stock Status:</strong><br>
                            {!! $product->stock_status == 'In Stock' ? '<span class="badge badge-success">In Stock</span>' : '<span class="badge badge-danger">Out Of Stock</span>' !!}
                        </div>
                        <div>
                            <strong>Publication:</strong><br>
                            {!! $product->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>' !!}
                        </div>
                        <div>
                            <strong>Featured:</strong><br>
                            {!! $product->is_featured == 1 ? '<span class="badge badge-warning">Yes</span>' : '<span class="badge badge-secondary">No</span>' !!}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Customer Engagement Metrics (Wishlist & Reviews Count) -->
            <div class="card mb-3 shadow-sm">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0"><i class="fa fa-heart"></i> Engagement Statistics</h5>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-6 border-right">
                            <h3 class="text-danger font-weight-bold">{{ $product->wishlists->count() }}</h3>
                            <span class="text-muted text-uppercase small">Wishlists</span>
                        </div>
                        <div class="col-6">
                            <h3 class="text-primary font-weight-bold">{{ $product->reviews->count() }}</h3>
                            <span class="text-muted text-uppercase small">Reviews</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Shop & Vendor Owner Context Block -->
            <div class="card mb-3 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fa fa-university"></i> Shop & Vendor History</h5>
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <tr>
                            <strong>
                                <th>Shop Name:</th>
                            </strong>
                            <td>{{ $product->shop ? $product->shop->shop_name : 'N/A' }}</td>
                        </tr>
                        <tr>
                            <strong>
                                <th>Vendor Legal Name:</th>
                            </strong>
                            <td>{{ $product->vendor ? $product->vendor->name ?? $product->vendor->shop_name ?? 'N/A' : 'N/A' }}</td>
                        </tr>
                        <tr>
                            <strong>
                                <th>Vendor ID Code:</th>
                            </strong>
                            <td><code>ID: #{{ $product->vendor_id ?? 'N/A' }}</code></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Right Side: Detailed Matrix, Descriptions, Gallery, Variants, and Reviews -->
        <div class="col-md-8">
            <!-- Core Specifications -->
            <div class="card mb-3 shadow-sm">
                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="fa fa-list-alt"></i> Core Product Specifications</h5>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-light text-dark"><i class="fa fa-edit"></i> Edit Product</a>
                </div>
                <div class="card-body p-0">
                    <table class="table table-bordered table-striped mb-0">
                        <tbody>
                            <tr>
                                <th width="30%">Brand Entity</th>
                                <td>{{ $product->brand ? $product->brand->brand_name : 'No Brand Mapped' }}</td>
                            </tr>
                            <tr>
                                <th>Category Mapping</th>
                                <td>
                                    @if($product->category->isNotEmpty())
                                    @foreach($product->category as $prodCat)
                                    <span class="badge badge-secondary">{{ $prodCat->categoryName ? $prodCat->categoryName->category_name : 'N/A' }}</span>
                                    @endforeach
                                    @else
                                    <span class="text-muted">No Categories Associated</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Cost Price (Base Expense)</th>
                                <td><strong class="text-danger">${{ number_format($product->cost_price, 2) }}</strong></td>
                            </tr>
                            <tr>
                                <th>Regular Price (MSRP)</th>
                                <td><strong class="text-dark">${{ number_format($product->regular_price, 2) }}</strong></td>
                            </tr>
                            <tr>
                                <th>Sale Offer Price</th>
                                <td><strong class="text-success">${{ number_format($product->sale_price, 2) }}</strong></td>
                            </tr>
                            <tr>
                                <th>Inventory Quantity</th>
                                <td>{{ $product->quantity }} units Available</td>
                            </tr>
                            <tr>
                                <th>Threshold Alert Limit</th>
                                <td><span class="text-warning font-weight-bold">{{ $product->alert_quantity }} units</span></td>
                            </tr>
                            <tr>
                                <th>Metatags / Keywords</th>
                                <td>{{ $product->tag ? $product->tag : 'None Assigned' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Dynamic Multi-Image Gallery Sub-asset Grid Container -->
            <div class="card mb-3 shadow-sm">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0"><i class="fa fa-image"></i> Product Image Gallery</h5>
                </div>
                <div class="card-body">
                    @if($product->gallery && $product->gallery->isNotEmpty())
                    <div class="row">
                        @foreach($product->gallery as $galItem)
                        <div class="col-6 col-md-3 mb-3">
                            <div class="img-thumbnail-wrapper p-1 border rounded">
                                <img src="{{ $galItem->image ?? $galItem->gallery_image }}" class="img-fluid rounded" style="height: 120px; width: 100%; object-fit: cover;">
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="text-center text-muted py-3">
                        <i class="fa fa-picture-o fa-xl d-block mb-2"></i> No extra gallery assets uploaded onto Supabase bucket for this item.
                    </div>
                    @endif
                </div>
            </div>

            <!-- Custom Attributes Variations Layout -->
            <div class="card mb-3 shadow-sm">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0"><i class="fa fa-tags"></i> Custom Variants & Specifications</h5>
                </div>
                <div class="card-body p-0">
                    @if($product->productAttributeValue && $product->productAttributeValue->isNotEmpty())
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle mb-0">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Variant Thumbnail</th>
                                    <th>Attribute Type</th>
                                    <th>Value / Variant</th>
                                    <th>Stock Qty</th>
                                    <th>Alert Qty</th>
                                    <th>Price Target</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($product->productAttributeValue as $attribute)
                                <tr>
                                    <td>
                                        <img src="{{ $attribute->image ? $attribute->image : 'https://placehold.co/100x100/png' }}" class="img-thumbnail" width="50" style="object-fit: cover;">
                                    </td>
                                    <td><span class="text-uppercase font-weight-bold">{{ $attribute->attributeType ? $attribute->attributeType->attribute_name : 'N/A' }}</span></td>
                                    <td><span class="badge badge-info px-2 py-1">{{ $attribute->attributeValue ? $attribute->attributeValue->value : 'N/A' }}</span></td>
                                    <td>{{ $attribute->quantity }} units</td>
                                    <td>{{ $attribute->alert_quantity }} units</td>
                                    <td><strong class="text-success">${{ number_format($attribute->sale_price, 2) }}</strong></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="p-4 text-center text-muted">
                        This product does not contain dynamic variant rows.
                    </div>
                    @endif
                </div>
            </div>

            <!-- Description Tab Matrix -->
            <div class="card mb-3 shadow-sm">
                <div class="card-header bg-light">
                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="short-tab" data-toggle="tab" href="#shortDesc" role="tab" aria-controls="shortDesc" aria-selected="true">Short Intro</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="long-tab" data-toggle="tab" href="#longDesc" role="tab" aria-controls="longDesc" aria-selected="false">Detailed Narrative</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="shortDesc" role="tabpanel" aria-labelledby="short-tab">
                            <p class="text-justify">{!! nl2br(e($product->short_description ?? 'No short description entry defined.')) !!}</p>
                        </div>
                        <div class="tab-pane fade" id="longDesc" role="tabpanel" aria-labelledby="long-tab">
                            <div class="p-1 text-justify">
                                {!! $product->long_description ?? '<p class="text-muted">No comprehensive logs found.</p>' !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Customer Reviews Log History -->
            <div class="card mb-3 shadow-sm">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0"><i class="fa fa-comments"></i> Customer Reviews Feedback Matrix</h5>
                </div>
                <div class="card-body">
                    @if($product->reviews && $product->reviews->isNotEmpty())
                    @foreach($product->reviews as $review)
                    <div class="border-bottom pb-3 mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <strong>{{ $review->user ? $review->user->name : 'Verified Customer' }}</strong>
                            <span class="text-warning">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fa {{ $i <= ($review->rating ?? $review->stars) ? 'fa-star' : 'fa-star-o' }}"></i>
                                    @endfor
                            </span>
                        </div>
                        <p class="text-muted small mb-1">Reviewed on {{ $review->created_at ? $review->created_at->format('M d, Y') : 'N/A' }}</p>
                        <p class="mb-0 text-justify">{{ $review->review ?? $review->comment ?? 'No text comment written.' }}</p>
                    </div>
                    @endforeach
                    @else
                    <div class="text-center text-muted py-3">
                        <i class="fa fa-commenting-o fa-xl d-block mb-2"></i> No active public reviews or ratings recorded for this item yet.
                    </div>
                    @endif
                </div>
            </div>

            <div class="text-right mb-4">
                <a href="{{ route('products.index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Back to Products Master List</a>
            </div>
        </div>
    </div>
</div>
@endsection
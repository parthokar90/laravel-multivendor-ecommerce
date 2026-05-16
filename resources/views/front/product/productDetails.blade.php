@extends('front.layout.master')

@section('title') Product Details @endsection

@section('content')

<!-- Banner -->
<section class="inner-page banner" data-img="{{ asset('front/assets/images/banner.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>{{ $product->product_name }}</h2>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home.page') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Product</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>



<!-- Product Details -->
<section class="shop-detail detail py-5">
    <div class="container">

        <div class="row">

            <!-- Image -->
            <div class="col-lg-5 col-md-6 mb-4">

                <img
                    src="{{ $product->image }}"
                    class="img-fluid"
                    alt="Product">

            </div>

            <!-- Info -->
            <div class="col-lg-7 col-md-6">

                <form action="{{ route('cart.store') }}" method="post">
                    @csrf

                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <div class="detail-content">

                        <!-- Stock -->
                        <span class="stock">
                            {{ $product->stock_status == 1 ? 'In Stock' : 'Out of Stock' }}
                        </span>

                        <!-- Name -->
                        <h4>{{ $product->product_name }}</h4>

                        <!-- Price -->
                        <h4>
                            ৳ {{ number_format($product->sale_price) }}

                            @if($product->regular_price > 0)
                            <span>
                                ৳ {{ number_format($product->regular_price) }}
                            </span>
                            @endif
                        </h4>

                        <!-- Description -->
                        <p>{{ $product->short_description }}</p>

                        <!-- Attributes -->
                        @foreach($product->productAttributeValue as $value)
                        <label>
                            <input type="radio" name="attribute" value="{{ $value->value_id }}">
                            {{ $value->attributeValue->attribute ?? 'N/A' }}
                        </label><br>
                        @endforeach


                        <!-- Quantity + Cart -->
                        <div class="mt-3 d-flex align-items-center gap-3">

                            <input type="number"
                                name="quantity"
                                value="1"
                                min="1"
                                class="form-control"
                                style="width: 100px;">

                            <button type="submit" class="btn btn-dark">
                                Add to Cart
                            </button>

                            <a href="{{ route('add.wishlist', $product->id) }}" class="btn btn-outline-danger">
                                ❤
                            </a>

                        </div>

                        <!-- Vendor / Shop / Brand -->
                        <div class="mt-4">

                            <h6>
                                Vendor:
                                {{ optional($product->vendor)->first_name
                                    ? optional($product->vendor)->first_name . ' ' . optional($product->vendor)->last_name
                                    : 'Default Vendor' }}
                            </h6>

                            <h6>
                                Shop:
                                {{ optional($product->shop)->shop_name ?? 'Default Shop' }}
                            </h6>

                            <h6>
                                Brand:
                                {{ optional($product->brand)->brand_name ?? 'Default Brand' }}
                            </h6>

                            <h6>
                                Category:
                                @forelse($product->category as $category)
                                {{ optional($category->categoryName)->category_name }},
                                @empty
                                Uncategorized
                                @endforelse
                            </h6>

                        </div>

                    </div>
                </form>

            </div>
        </div>

    </div>
</section>

@endsection
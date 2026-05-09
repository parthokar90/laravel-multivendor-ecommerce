@extends('front.layout.master')

@section('content')

<!-- start banner area -->
<section class="inner-page banner" data-img="{{ asset('front/assets/images/banner.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>{{ $shop->shop_name }}</h2>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home.page') }}">Home</a>
                        </li>

                        <li class="breadcrumb-item active" aria-current="page">
                            {{ $shop->shop_name }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- end banner area -->


<!-- start shop area -->
<section class="shop-page main py-5">
    <div class="container">

        <div class="row">

            @forelse ($shop->products as $products)

            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="single-item">

                    <div class="image-area">
                        <a href="{{ route('product.single', ['id' => $products->id, 'slug' => $products->product_slug]) }}">

                            <img src="{{ $products->image }}"
                                class="img-fluid"
                                alt="{{ $products->product_name }}">
                        </a>
                    </div>

                    <div class="bottom-area text-center mt-3">

                        <a href="{{ route('product.single', ['id' => $products->id, 'slug' => $products->product_slug]) }}">
                            <h5>{{ $products->product_name }}</h5>
                        </a>

                        @if($products->sale_price)
                        <p class="price">
                            ৳ {{ $products->sale_price }}
                        </p>
                        @endif

                        <a href="{{ route('product.single', ['id' => $products->id, 'slug' => $products->product_slug]) }}"
                            class="add-cart button-style1">
                            View Details
                            <span class="btn-dot"></span>
                        </a>

                    </div>
                </div>
            </div>

            @empty

            <div class="col-12 text-center">
                <p>No Product Found</p>
            </div>

            @endforelse

        </div>

    </div>
</section>
<!-- end shop area -->

@endsection
@extends('front.layout.master')

@section('title') Home @endsection

@push('css')
<style>
    .custom-card {
        border: none;
        border-radius: 18px;
        overflow: hidden;
        background: #fff;
        transition: all .35s ease;
        box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
    }

    .custom-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 50px rgba(0, 0, 0, .15);
    }

    .custom-card .card-img-top {
        height: 220px;
        width: 100%;
        object-fit: cover;
        transition: .5s;
    }

    .custom-card:hover .card-img-top {
        transform: scale(1.08);
    }

    .custom-card .card-body {
        padding: 24px;
    }

    .custom-card .card-title {
        font-size: 20px;
        font-weight: 600;
        color: #222;
        line-height: 1.5;
        margin-bottom: 12px;
    }

    .custom-card .card-text {
        color: #777;
        line-height: 1.8;
        font-size: 14px;
    }

    .btn-black {
        background: #111;
        color: #fff;
        border-radius: 50px;
        padding: 10px 24px;
        border: none;
        font-weight: 500;
        transition: .3s;
    }

    .btn-black:hover {
        background: #ff6b00;
        color: #fff;
    }

    .shop-card-link {
        text-decoration: none;
        color: inherit;
    }

    .shop-product-count {
        display: inline-block;
        margin-top: 10px;
        padding: 8px 16px;
        background: #f5f5f5;
        border-radius: 30px;
        font-size: 14px;
        font-weight: 600;
        color: #555;
    }

    .blog-date {
        color: #999;
        font-size: 13px;
        margin-bottom: 10px;
    }

    .section-title {
        font-size: 34px;
        font-weight: 700;
        margin-bottom: 40px;
        text-align: center;
        color: #222;
    }

    @media(max-width:768px) {
        .custom-card .card-title {
            font-size: 18px;
        }

        .custom-card .card-img-top {
            height: 200px;
        }
    }
</style>
@endpush

@section('content')

<!-- ================= SHOP LIST ================= -->
<section class="py-5">
    <div class="container">
        <div class="section-title mb-4">
            <h3>Shop List</h3>
        </div>
        <div class="row">
            @forelse ($shop->take(8) as $shops)
            <div class="col-md-3 mb-4">
                <a href="{{ route('shop.single', ['id'=>$shops->id,'slug'=>$shops->shop_slug]) }}"
                    style="text-decoration:none; color:inherit;">

                    <div class="card custom-card text-center h-100">

                        <img src="https://placehold.co/300x200?text={{ $shops->shop_name }}"
                            class="card-img-top">

                        <div class="card-body">
                            <h5 class="card-title">{{ $shops->products->count() }} Products</h5>
                        </div>
                    </div>
                </a>
            </div>
            @empty
            <p>No Shop Found</p>
            @endforelse
        </div>
    </div>
</section>


<!-- ================= BRAND ================= -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="section-title mb-4">
            <h3>Brands</h3>
        </div>
        <div class="row">
            @forelse ($brand as $brands)
            <div class="col-md-3 mb-4">
                <a href="{{ route('brand.product', ['id'=>$brands->id,'slug'=>$brands->slug]) }}"
                    style="text-decoration:none; color:inherit;">
                    <div class="card custom-card text-center h-100">
                        <img src="https://placehold.co/300x200?text={{ $brands->brand_name }}"
                            class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $brands->products->count() }} Products</h5>
                        </div>
                    </div>
                </a>
            </div>
            @empty
            <p>No Brand Found</p>
            @endforelse
        </div>
    </div>
</section>


<!-- ================= BLOG ================= -->
<section class="py-5">
    <div class="container">
        <div class="section-title mb-4">
            <h3>From The Blog</h3>
        </div>

        <div class="row">

            <!-- Blog 1 -->
            <div class="col-md-4 col-lg-3 mb-4">
                <div class="card custom-card h-100">
                    <img src="https://placehold.co/600x400" class="card-img-top" alt="Blog">

                    <div class="card-body">
                        <p class="text-muted small">
                            May 09, 2026
                        </p>

                        <h5 class="card-title">
                            Top Fashion Trends You Should Follow This Season
                        </h5>

                        <p class="card-text small text-muted">
                            Discover the latest fashion trends and styling ideas to upgrade your wardrobe effortlessly.
                        </p>

                        <a href="#" class="btn btn-black btn-sm mt-2">Read More</a>
                    </div>
                </div>
            </div>

            <!-- Blog 2 -->
            <div class="col-md-4 col-lg-3 mb-4">
                <div class="card custom-card h-100">
                    <img src="https://placehold.co/600x400" class="card-img-top" alt="Blog">

                    <div class="card-body">
                        <p class="text-muted small">
                            May 05, 2026
                        </p>

                        <h5 class="card-title">
                            How To Choose The Perfect Accessories
                        </h5>

                        <p class="card-text small text-muted">
                            Learn how to match accessories with your outfit and create a complete modern look.
                        </p>

                        <a href="#" class="btn btn-black btn-sm mt-2">Read More</a>
                    </div>
                </div>
            </div>

            <!-- Blog 3 -->
            <div class="col-md-4 col-lg-3 mb-4">
                <div class="card custom-card h-100">
                    <img src="https://placehold.co/600x400" class="card-img-top" alt="Blog">

                    <div class="card-body">
                        <p class="text-muted small">
                            April 28, 2026
                        </p>

                        <h5 class="card-title">
                            Everyday Essentials For A Minimal Lifestyle
                        </h5>

                        <p class="card-text small text-muted">
                            Explore must-have daily essentials that combine simplicity, comfort, and style.
                        </p>

                        <a href="#" class="btn btn-black btn-sm mt-2">Read More</a>
                    </div>
                </div>
            </div>

            <!-- Blog 4 -->
            <div class="col-md-4 col-lg-3 mb-4">
                <div class="card custom-card h-100">
                    <img src="https://placehold.co/600x400" class="card-img-top" alt="Blog">

                    <div class="card-body">
                        <p class="text-muted small">
                            April 20, 2026
                        </p>

                        <h5 class="card-title">
                            Smart Shopping Tips To Save More Money
                        </h5>

                        <p class="card-text small text-muted">
                            Follow these practical shopping tips to get the best deals without compromising quality.
                        </p>

                        <a href="#" class="btn btn-black btn-sm mt-2">Read More</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
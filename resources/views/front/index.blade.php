@extends('front.layout.master')

@section('title') Home @endsection

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
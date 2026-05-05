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

            @forelse ($brand->take(4) as $brands)
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
            @forelse ($blog as $blogs)
            <div class="col-md-4 mb-4">
                <div class="card custom-card h-100">
                    <img src="{{ asset('admin/blog/'.$blogs->image) }}" class="card-img-top" alt="Blog">

                    <div class="card-body">
                        <p class="text-muted small">
                            {{ date('F d, Y',strtotime($blogs->created_at)) }}
                        </p>
                        <h5 class="card-title">{{ $blogs->title }}</h5>

                        <a href="#" class="btn btn-black btn-sm mt-2">Read More</a>
                    </div>
                </div>
            </div>
            @empty
            <p>No Blog Found</p>
            @endforelse
        </div>
    </div>
</section>

@endsection
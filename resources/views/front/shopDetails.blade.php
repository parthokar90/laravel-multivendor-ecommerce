@extends('front.layout.master')


@section('content')
     <!-- start banner area -->
     <section class="inner-page banner" data-img="{{asset('front/assets/images/banner.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Shop Details</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                          <li class="breadcrumb-item"><a href="{{route('home.page')}}">Home</a></li>
                          <li class="breadcrumb-item active" aria-current="page">{{$shop->shop_name}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- end banner area -->

    <!-- start main area -->
    <section class="shop-page left-sidebar main">
        <div class="container">
            <div class="row">
                <!-- left content -->
                <div class="col-xl-3 col-lg-4 col-md-8 offset-md-2 offset-lg-0">
                    <div class="content left-content inner-page sidebar">
                        <!-- section 1 -->
                        <div class="section search">
                            <div class="title">
                                <h4>search products</h4>
                            </div>
                            <form action="#!">
                                <input type="search" placeholder="search here..." class="inputs">
                                <button type="submit"><i class="flaticon-search"></i></button>
                            </form>
                        </div>
                        <!-- section 2 -->
                        <div class="section filter">
                            <div class="title">
                                <h4>Filter by price</h4>
                            </div>
                            <div class="price-filter-range">
                                <form action="#">
                                    <div id="slider-range"></div>
                                    <div class="price-range d-flex justify-content-between align-items-center">
                                        <p>price: <input type="text" id="amount"></p>
                                        <button type="submit">filter</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- section 3 -->
                        <div class="section category">
                            <div class="title">
                                <h4>categories</h4>
                            </div>
                            <ul>
                                <li>
                                    <a href="category.html" class="d-flex justify-content-between">
                                        <p>Dairy Bread & Eggs </p>
                                        <p>07</p>
                                    </a>
                                </li>
            
                                <li>
                                    <a href="category.html" class="d-flex justify-content-between">
                                        <p>bread & bakery</p>
                                        <p>18</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- section 4 -->
                        <div class="section popular">
                            <div class="title">
                                <h4>popular product</h4>
                            </div>
                            <ul class="small-item">
                                <li class="item d-flex align-items-center">
                                    <div class="image">
                                        <a href="shop-detail.html">
                                            <img src="{{asset('front/assets/images/product/img3.jpg')}}" alt="Product"/>
                                        </a>
                                    </div>
                                    <div class="item-body">
                                        <a href="shop-detail.html">
                                            <h5>Smart Unique Oversize Cotton Dress</h5>
                                        </a>
                                        <p><span>$120</span> - $99</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- section 5 -->
                        <div class="section newsletter">
                            <div class="title">
                                <h4>newsletter</h4>
                            </div>
                            <form action="#!">
                                <input type="text" placeholder="enter email" class="inputs">
                                <button type="submit">submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- right content -->
                <div class="col-xl-9 col-lg-8">
                    <div class="content right-content">
                        <div class="title d-flex justify-content-between align-items-center">
                            <h4>{{$shop->shop_name}}</h4>
                            <ul class="d-flex">
                                <li><a href="shop-list-left.html"><i class="flaticon-list"></i></a></li>
                                <li><a href="shop-3-column-sidebar.html" class="active"><i class="flaticon-grid"></i></a></li>
                            </ul>
                        </div>
                        <div class="home1 collection">
                            <div class="row">

                             @forelse ($shop->products as $products)
                             <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="single-item">
                                    <div class="image-area">
                                        <a href="shop-detail.html">
                                            <img src="{{asset('front/assets/images/home1/product/p5a.jpg')}}" class="img-active" alt="Product Image"/>
                                        </a>
                                        <a href="shop-detail.html">
                                            <img src="{{asset('front/assets/images/home1/product/p5b.jpg')}}" class="img-hover" alt="Product Image"/>
                                        </a>
                                        <span class="sale-status">sale</span>
                                        <div class="action">
                                            <ul>
                                                <li>
                                                    <a href="wishlist.html">
                                                        <i class="far fa-heart"></i>
                                                        <p class="my-tooltip">
                                                            add to wishlist
                                                        </p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        <i class="far fa-eye"></i>
                                                        <p class="my-tooltip">
                                                            quick view
                                                        </p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="cart.html">
                                                        <i class="flaticon-shopping-cart-1"></i>
                                                        <p class="my-tooltip">
                                                            add to cart
                                                        </p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="compare.html">
                                                        <i class="fas fa-sync-alt"></i>
                                                        <p class="my-tooltip">
                                                            compare
                                                        </p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="bottom-area">
                                        <ul class="rating d-flex">
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                        <a href="shop-detail.html">
                                            <h5>{{$products->product_name}}</h5>
                                        </a>
                                        <a href="#!" class="add-cart button-style1">View More <span class="btn-dot"></span></a>
                                    </div>
                                </div>
                            </div>
                              @empty
                                <p>No Product Found</p>
                             @endforelse
                                <div class="col-lg-12">
                                    <div class="pages">
                                        <ul class="d-flex justify-content-center">
                                            <li><a href="#!"><i class="flaticon-chevron-1"></i></a></li>
                                            <li><a href="#!" class="active">1</a></li>
                                            <li><a href="#!">2</a></li>
                                            <li><a href="#!">3</a></li>
                                            <li><a href="#!">4</a></li>
                                            <li><a href="#!"><i class="flaticon-chevron"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end main area -->
@endsection 
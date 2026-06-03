@extends('front.layout.master')

@section('title') All Shop @endsection

@section('content') 
    <!-- start banner area -->
    <section class="inner-page banner" data-img="{{asset('front/assets/images/banner.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>shop</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                          <li class="breadcrumb-item"><a href="{{route('home.page')}}">Home</a></li>
                          <li class="breadcrumb-item active" aria-current="page">shop</li>
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
                <div class="col-lg-12">
                    <div class="content">
                        <div class="title d-flex justify-content-between align-items-center">
                            <h4>Home/Shop</h4>
                            <ul class="d-flex">
                                <li><a href="shop-list-left.html"><i class="flaticon-list"></i></a></li>
                                <li><a href="shop-5-column.html" class="active"><i class="flaticon-grid"></i></a></li>
                            </ul>
                        </div>
                        <div class="home1 collection">
                            <div class="row">
                                @forelse ($allShop as $shops)
                                <div class="col-lg-1-5 col-lg-3 col-md-4 col-sm-6">
                                    <div class="single-item">
                                        <div class="image-area">
                                            <a href="shop-detail.html">
                                                <img src="{{asset('vendor/shop/'.$shops->logo)}}" class="img-active" alt="Shop Logo"/>
                                            </a>
                                            <a href="{{route('shop.single',array('id'=>$shops->id,'slug'=>$shops->shop_slug))}}">
                                                <img src="{{asset('vendor/shop/'.$shops->logo)}}" class="img-hover" alt="Shop Logo"/>
                                            </a>
                                            <span class="sale-status">{{$shops->shop_name}}</span>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                 <p>No Shop Found</p>
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
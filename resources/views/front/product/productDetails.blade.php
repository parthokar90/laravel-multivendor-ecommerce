@extends('front.layout.master')

@section('title') Product Details @endsection

@section('content') 
  <!-- start banner area -->
  <section class="inner-page banner" data-img="{{asset('front/assets/images/banner.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>shop details left sidebar</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="{{route('home.page')}}">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Product</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- end banner area -->

<!-- start detail area -->
<section class="shop-detail detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="image-area">
                    <div class="img-gallery">
                        <div class="item">
                            <img id="zoom_01" src="{{asset('front/assets/images/shop/shop1.jpg')}}" alt="Product" data-zoom-image="assets/images/shop/shop1.jpg">
                        </div>
                        <div class="item">
                            <img id="zoom_02" src="{{asset('front/assets/images/shop/shop2.jpg')}}" alt="Product" data-zoom-image="assets/images/shop/shop2.jpg">
                        </div>
                    </div>
                    <div class="img-thumb">
                        <div class="item">
                            <img src="{{asset('front/assets/images/shop/shop-sm1.jpg')}}" alt="Product">
                        </div>
                        <div class="item">
                            <img src="{{asset('front/assets/images/shop/shop-sm2.jpg')}}" alt="Product">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-6">
                <div class="detail-content">
                    <span class="stock">in stock</span>
                    <h4>{{$product->product_name}}</h4>
                    <div class="review-area d-flex align-items-center">
                        <ul class="rating d-flex">
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                        </ul>
                        <p>(2 customer review)</p>
                    </div>
                    <h4 style="display:none">$671.73 – <span>$921.45</span></h4>
                    <p class="desc">{{$product->short_description}} </p>

                    @if($attributeType->count()>0)
                    <label>Select Attribute</label>
                    <select class="form-control" name="type_id">
                         <option value="">Select</option>
                            @foreach($attributeType as $types)
                            <option value="{{$types->type_id}}">{{$types->attribute_type}}</option>
                            @endforeach
                    </select>
                    @endif
                    <div class="border-area">
                        <div class="cart-part d-flex align-items-center">
                            <div class="d-flex number-spinner">
                                
                                <input type="text" class="form-control text-center input-value" value="1">
                                <div class="buttons">
                                    <button data-dir="up" class="up-btn"><i class="flaticon-plus"></i></button>
                                    <button data-dir="dwn" class="down-btn"><i class="flaticon-remove"></i></button>
                                </div>
                            </div>
                            <a href="#!" class="cart button-style1">add to cart <span class="btn-dot"></span></a>
                            <a href="#!" class="add-more"><i class="far fa-heart"></i></a>
                            <a href="#!" class="add-more"><i class="fas fa-sync-alt"></i></a>
                        </div>
                    </div>
                    <h5>Vendor : <a href="#!">{{$product->vendor->first_name}} {{$product->vendor->last_name}}</a></h5>
                    <h5>Shop : <a href="#!">{{$product->shop->shop_name}}</a> </h5>
                    <h5>Category : <a href="#!">fashion,</a> <a href="#!">trend</a></h5>
                    <h5>Tags : <a href="#!">fashion,</a> <a href="#!">trend</a></h5>
                    <div class="share d-flex align-items-center">
                        <h5>share : </h5>
                        <ul class="d-flex">
                            <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#!"><i class="fab fa-pinterest-p"></i></a></li>
                            <li><a href="#!"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#!"><i class="fab fa-google-plus-g"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end detail area -->

<!-- start review area -->
<section class="shop-detail review">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">description</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">review <span>(2)</span></button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                       
                        <p>{{$product->long_description}}</p>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-lg-7">
                                <ul class="comment">
                                    <li class="item d-flex">
                                        <div class="image">
                                            <a href="#!">
                                                <img src="{{asset('front/assets/images/shop/review1.jpg')}}" alt="Review Image">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <ul class="rating d-flex">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                            </ul>
                                            <a href="#!"><h5>Kenneth R. Myers</h5></a>
                                            <a href="#!"><p>August 11, 2021</p></a>
                                            <p>I am 6 feet tall and 220 lbs. This shirt fit me perfectly in the che shoulders. Myt only complaint is that it is so long! I like to wear polo shirts untucked This shirt goes completely past my rear end If I wore it with ordy shorts you probably wouldnt be able to see the shorts at all – completelythe shirt. It needs to be 4 inches shorter in terms of length to suitable
                                                woretheit with ordinary shorts, you probably</p>
                                        </div>
                                    </li>
                                    <li class="item d-flex">
                                        <div class="image">
                                            <a href="#!">
                                                <img src="{{asset('front/assets/images/shop/review2.jpg')}}" alt="Review Image">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <ul class="rating d-flex">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                            </ul>
                                            <a href="#!"><h5>Mike Addington</h5></a>
                                            <a href="#!"><p>August 11, 2021</p></a>
                                            <p>I am 6 feet tall and 220 lbs. This shirt fit me perfectly in the che shoulders. Myt only complaint is that it is so long! I like to wear polo shirts untucked This shirt goes completely past my rear end If I wore it with ordy shorts you probably wouldnt be able to see . </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-5">
                                <div class="add-review">
                                    <h5>Add A Review</h5>
                                    <p>Your email address will not be published</p>
                                    <!-- Rating Stars Box -->
                                    <div class="rating-stars d-flex">
                                        <p>give your rating</p>
                                        <ul id="stars">
                                            <li class='star' title='Poor' data-value='1'>
                                                <i class='fas fa-star fa-fw'></i>
                                            </li>
                                            <li class='star' title='Fair' data-value='2'>
                                                <i class='fas fa-star fa-fw'></i>
                                            </li>
                                            <li class='star' title='Good' data-value='3'>
                                                <i class='fas fa-star fa-fw'></i>
                                            </li>
                                            <li class='star' title='Excellent' data-value='4'>
                                                <i class='fas fa-star fa-fw'></i>
                                            </li>
                                            <li class='star' title='WOW!!!' data-value='5'>
                                                <i class='fas fa-star fa-fw'></i>
                                            </li>
                                        </ul>
                                    </div>
                                    <form action="#">
                                        <textarea placeholder="your review*" class="inputs" required></textarea>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <input type="text" placeholder="your name*" class="inputs" required>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <input type="email" placeholder="your email*" class="inputs" required>
                                            </div>
                                            <div class="col-lg-12">
                                                <button type="submit" class="button-style1">submit <span class="btn-dot"></span></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end review area -->

<!-- start featured area -->
<section class="home1 shop-detail featured">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h3>you may also like</h3>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row featured-slider">
                    <div class="col-lg-3">
                        <div class="single-product">
                            <div class="image-area">
                                <img src="{{asset('front/assets/images/home1/featured/p1a.jpg')}}" class="img-main" alt="Product Image"/>
                                <img src="{{asset('front/assets/images/home1/featured/p1b.jpg')}}" class="img-hover" alt="Product Image"/>
                                <span class="sale-status">sale</span>
                                <div class="action">
                                    <ul class="d-flex">
                                        <li>
                                            <a href="#!">
                                                <i class="far fa-heart"></i>
                                                <p class="my-tooltip">add to wishlist</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#!">
                                                <i class="far fa-eye"></i>
                                                <p class="my-tooltip">quick view</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#!">
                                                <i class="flaticon-shopping-cart-1"></i>
                                                <p class="my-tooltip">add to cart</p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="bottom-area">
                                <a href="shop-detail.html">
                                    <h5>Contrast Print T-Shirt</h5>
                                </a>
                                <p><span>$110</span> - $78</p>
                                <ul class="rating d-flex">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end featured area -->
@endsection
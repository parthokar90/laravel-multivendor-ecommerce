  @extends('front.layout.master')


  @section('content')
  
        <!-- start header area -->
        @include('front.include.header')
        <!-- end header area -->

        <!-- start fancybox area -->
            @include('front.include.fancybox')
        <!-- end fancybox area -->

        <!-- start banner area -->
            @include('front.include.banner')
        <!-- end banner area -->

        <!-- start feature area -->
            @include('front.include.feature')
        <!-- end feature area -->

             <!-- start category area -->
      <section class="home1 category">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3>Shop List</h3>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-xl-3 col-lg-5">
                            <div class="single-category cat-height item-animation">
                                <img src="{{asset('front/assets/images/home1/category/image1.jpg')}}" alt="Category Image"/>
                                <div class="content">
                                    <h5>Apple - 11 Inch iPad Pro</h5>
                                    <p>new generation</p>
                                    <p>3 products</p>
                                    <a href="shop-4-column.html">view more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-7">
                            <div class="row">
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                    <div class="single-category item-animation">
                                        <img src="{{asset('front/assets/images/home1/category/image2.jpg')}}" alt="Category Image"/>
                                        <div class="content">
                                            <h5>gadgets</h5>
                                            <p>new generation</p>
                                            <p>3 products</p>
                                            <a href="shop-4-column.html">view more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                    <div class="single-category item-animation">
                                        <img src="{{asset('front/assets/images/home1/category/image3.jpg')}}" alt="Category Image"/>
                                        <div class="content">
                                            <h5>furniture</h5>
                                            <p>decorate room</p>
                                            <p>5 products</p>
                                            <a href="shop-4-column.html">view more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                    <div class="single-category item-animation">
                                        <img src="{{asset('front/assets/images/home1/category/image4.jpg')}}" alt="Category Image"/>
                                        <div class="content">
                                            <h5>glasses</h5>
                                            <p>new generation</p>
                                            <p>7 products</p>
                                            <a href="shop-4-column.html">view more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                    <div class="single-category item-animation">
                                        <img src="{{asset('front/assets/images/home1/category/image5.jpg')}}" alt="Category Image"/>
                                        <div class="content">
                                            <h5>watches</h5>
                                            <p>new generation</p>
                                            <p>1 products</p>
                                            <a href="shop-4-column.html">view more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                    <div class="single-category item-animation">
                                        <img src="{{asset('front/assets/images/home1/category/image6.jpg')}}" alt="Category Image"/>
                                        <div class="content">
                                            <h5>digital camera</h5>
                                            <p>new generation</p>
                                            <p>4 products</p>
                                            <a href="shop-4-column.html">view more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                    <div class="single-category item-animation">
                                        <img src="{{asset('front/assets/images/home1/category/image7.jpg')}}" alt="Category Image"/>
                                        <div class="content">
                                            <h5>shoes</h5>
                                            <p>best shoes</p>
                                            <p>2 products</p>
                                            <a href="shop-4-column.html">view more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section>
     <!-- end category area -->

       <!-- start category area -->
        <section class="home1 category">
          <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3>product categories</h3>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-xl-3 col-lg-5">
                            <div class="single-category cat-height item-animation">
                                <img src="{{asset('front/assets/images/home1/category/image1.jpg')}}" alt="Category Image"/>
                                <div class="content">
                                    <h5>Apple - 11 Inch iPad Pro</h5>
                                    <p>new generation</p>
                                    <p>3 products</p>
                                    <a href="shop-4-column.html">view more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-7">
                            <div class="row">
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                    <div class="single-category item-animation">
                                        <img src="{{asset('front/assets/images/home1/category/image2.jpg')}}" alt="Category Image"/>
                                        <div class="content">
                                            <h5>gadgets</h5>
                                            <p>new generation</p>
                                            <p>3 products</p>
                                            <a href="shop-4-column.html">view more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                    <div class="single-category item-animation">
                                        <img src="{{asset('front/assets/images/home1/category/image3.jpg')}}" alt="Category Image"/>
                                        <div class="content">
                                            <h5>furniture</h5>
                                            <p>decorate room</p>
                                            <p>5 products</p>
                                            <a href="shop-4-column.html">view more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                    <div class="single-category item-animation">
                                        <img src="{{asset('front/assets/images/home1/category/image4.jpg')}}" alt="Category Image"/>
                                        <div class="content">
                                            <h5>glasses</h5>
                                            <p>new generation</p>
                                            <p>7 products</p>
                                            <a href="shop-4-column.html">view more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                    <div class="single-category item-animation">
                                        <img src="{{asset('front/assets/images/home1/category/image5.jpg')}}" alt="Category Image"/>
                                        <div class="content">
                                            <h5>watches</h5>
                                            <p>new generation</p>
                                            <p>1 products</p>
                                            <a href="shop-4-column.html">view more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                    <div class="single-category item-animation">
                                        <img src="{{asset('front/assets/images/home1/category/image6.jpg')}}" alt="Category Image"/>
                                        <div class="content">
                                            <h5>digital camera</h5>
                                            <p>new generation</p>
                                            <p>4 products</p>
                                            <a href="shop-4-column.html">view more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                    <div class="single-category item-animation">
                                        <img src="{{asset('front/assets/images/home1/category/image7.jpg')}}" alt="Category Image"/>
                                        <div class="content">
                                            <h5>shoes</h5>
                                            <p>best shoes</p>
                                            <p>2 products</p>
                                            <a href="shop-4-column.html">view more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section>
     <!-- end category area -->

        <!-- start collection area -->
        <section class="home1 collection">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h3>our top collection</h3>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">best seller</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">trending</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">new arrival</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <!-- best seller -->
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="single-item">
                                            <div class="image-area">
                                                <a href="shop-detail-left.html">
                                                    <img src="{{asset('front/assets/images/home1/product/p8a.jpg')}}" class="img-active" alt="Product Image"/>
                                                </a>
                                                <a href="shop-detail-left.html">
                                                    <img src="{{asset('front/assets/images/home1/product/p8b.jpg')}}" class="img-hover" alt="Product Image"/>
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
                                                                <i class="flaticon-shopping-cart"></i>
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
                                                <div class="size">
                                                    <ul class="d-flex">
                                                        <li>
                                                            <a href="#!">s</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">m</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">l</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">xl</a>
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
                                                <a href="shop-detail-left.html">
                                                    <h5>Faux suede bomber jacket</h5>
                                                </a>
                                                <p><span>$110</span> - $78</p>
                                                <a href="#!" class="add-cart button-style1">add to cart <span class="btn-dot"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- trending -->
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">          
      
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="single-item">
                                            <div class="image-area">
                                                <a href="shop-detail-left.html">
                                                    <img src="{{asset('front/assets/images/home1/product/p7a.jpg')}}" class="img-active" alt="Product Image"/>
                                                </a>
                                                <a href="shop-detail-left.html">
                                                    <img src="{{asset('front/assets/images/home1/product/p7b.jpg')}}" class="img-hover" alt="Product Image"/>
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
                                                                <i class="flaticon-shopping-cart"></i>
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
                                                <div class="size">
                                                    <ul class="d-flex">
                                                        <li>
                                                            <a href="#!">s</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">m</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">l</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">xl</a>
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
                                                <a href="shop-detail-left.html">
                                                    <h5>Faux suede bomber jacket</h5>
                                                </a>
                                                <p><span>$110</span> - $78</p>
                                                <a href="#!" class="add-cart button-style1">add to cart <span class="btn-dot"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- new arrival -->
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="row">
                                
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="single-item">
                                            <div class="image-area">
                                                <a href="shop-detail-left.html">
                                                    <img src="{{asset('front/assets/images/home1/product/p7a.jpg')}}" class="img-active" alt="Product Image"/>
                                                </a>
                                                <a href="shop-detail-left.html">
                                                    <img src="{{asset('front/assets/images/home1/product/p7b.jpg')}}" class="img-hover" alt="Product Image"/>
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
                                                                <i class="flaticon-shopping-cart"></i>
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
                                                <div class="size">
                                                    <ul class="d-flex">
                                                        <li>
                                                            <a href="#!">s</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">m</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">l</a>
                                                        </li>
                                                        <li>
                                                            <a href="#!">xl</a>
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
                                                <a href="shop-detail-left.html">
                                                    <h5>oversize cotton dress</h5>
                                                </a>
                                                <p><span>$110</span> - $78</p>
                                                <a href="#!" class="add-cart button-style1">add to cart <span class="btn-dot"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end collection area -->

        <!-- start offer area -->
       <section class="home1 offer">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="item item1 item-animation" data-img="{{asset('front/assets/images/home1/offer1.jpg')}}">
                        <h5>black friday</h5>
                        <h4>Save Up To 50% Off On All Latest Fashion</h4>
                        <a href="shop-5-column.html" class="button-style1">view more <span class="btn-dot"></span></a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="item item2 item-animation" data-img="{{asset('front/assets/images/home1/offer2.jpg')}}">
                        <h5>festival season</h5>
                        <h4>Awesome Jewellery Sets for Woman</h4>
                        <a href="shop-detail-left.html" class="button-style1">buy now <span class="btn-dot"></span></a>
                    </div>
                </div>
            </div>
        </div>
      </section>
    <!-- end offer area -->

 

       <!-- start featured area -->
       <section class="home1 featured">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3>featured product</h3>
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
                                                <a href="wishlist.html">
                                                    <i class="far fa-heart"></i>
                                                    <p class="my-tooltip">add to wishlist</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#!" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <i class="far fa-eye"></i>
                                                    <p class="my-tooltip">quick view</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="cart.html">
                                                    <i class="flaticon-shopping-cart"></i>
                                                    <p class="my-tooltip">add to cart</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="bottom-area">
                                    <a href="shop-detail-left.html">
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
                        <div class="col-lg-3">
                            <div class="single-product">
                                <div class="image-area">
                                    <img src="{{asset('front/assets/images/home1/featured/p2a.jpg')}}" class="img-main" alt="Product Image"/>
                                    <img src="{{asset('front/assets/images/home1/featured/p2b.jpg')}}" class="img-hover" alt="Product Image"/>
                                    <span class="sale-status">sale</span>
                                    <div class="action">
                                        <ul class="d-flex">
                                            <li>
                                                <a href="wishlist.html">
                                                    <i class="far fa-heart"></i>
                                                    <p class="my-tooltip">add to wishlist</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#!" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <i class="far fa-eye"></i>
                                                    <p class="my-tooltip">quick view</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="cart.html">
                                                    <i class="flaticon-shopping-cart"></i>
                                                    <p class="my-tooltip">add to cart</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="bottom-area">
                                    <a href="shop-detail-left.html">
                                        <h5>Black Fit Polo Shirt</h5>
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
                        <div class="col-lg-3">
                            <div class="single-product">
                                <div class="image-area">
                                    <img src="{{asset('front/assets/images/home1/featured/p3a.jpg')}}" class="img-main" alt="Product Image"/>
                                    <img src="{{asset('front/assets/images/home1/featured/p3b.jpg')}}" class="img-hover" alt="Product Image"/>
                                    <span class="sale-status">new</span>
                                    <div class="action">
                                        <ul class="d-flex">
                                            <li>
                                                <a href="wishlist.html">
                                                    <i class="far fa-heart"></i>
                                                    <p class="my-tooltip">add to wishlist</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#!" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <i class="far fa-eye"></i>
                                                    <p class="my-tooltip">quick view</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="cart.html">
                                                    <i class="flaticon-shopping-cart"></i>
                                                    <p class="my-tooltip">add to cart</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="bottom-area">
                                    <a href="shop-detail-left.html">
                                        <h5>T-shirt with Chest Pocket</h5>
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
                        <div class="col-lg-3">
                            <div class="single-product">
                                <div class="image-area">
                                    <img src="{{asset('front/assets/images/home1/featured/p4a.jpg')}}" class="img-main" alt="Product Image"/>
                                    <img src="{{asset('front/assets/images/home1/featured/p4b.jpg')}}" class="img-hover" alt="Product Image"/>
                                    <span class="sale-status">sale</span>
                                    <div class="action">
                                        <ul class="d-flex">
                                            <li>
                                                <a href="wishlist.html">
                                                    <i class="far fa-heart"></i>
                                                    <p class="my-tooltip">add to wishlist</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#!" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <i class="far fa-eye"></i>
                                                    <p class="my-tooltip">quick view</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="cart.html">
                                                    <i class="flaticon-shopping-cart"></i>
                                                    <p class="my-tooltip">add to cart</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="bottom-area">
                                    <a href="shop-detail-left.html">
                                        <h5>Muscle Fit Polo Shirt</h5>
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
                        <div class="col-lg-3">
                            <div class="single-product">
                                <div class="image-area">
                                    <img src="{{asset('front/assets/images/home1/featured/p3a.jpg')}}" class="img-main" alt="Product Image"/>
                                    <img src="{{asset('front/assets/images/home1/featured/p3b.jpg')}}" class="img-hover" alt="Product Image"/>
                                    <span class="sale-status">new</span>
                                    <div class="action">
                                        <ul class="d-flex">
                                            <li>
                                                <a href="wishlist.html">
                                                    <i class="far fa-heart"></i>
                                                    <p class="my-tooltip">add to wishlist</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#!" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <i class="far fa-eye"></i>
                                                    <p class="my-tooltip">quick view</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="cart.html">
                                                    <i class="flaticon-shopping-cart"></i>
                                                    <p class="my-tooltip">add to cart</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="bottom-area">
                                    <a href="shop-detail-left.html">
                                        <h5>T-shirt with Chest Pocket</h5>
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

     <!-- start new area -->
       <section class="home1 new" data-img="{{asset('front/assets/images/home1/new-bg.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="content">
                            <h5>new collection</h5>
                            <h3>Get Upto 25% Off New Fashion Collection in 2021</h3>
                            <a href="shop-5-column.html">discover now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
     <!-- end new area -->

    <!-- start blog area -->
    <section class="home1 blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3>from the blog</h3>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="single-blog">
                                <div class="blog-img item-animation3">
                                    <span class="item-animation3a"></span>
                                    <img src="{{asset('front/assets/images/home1/blog/blog1.jpg')}}" alt="Blog Image"/>
                                </div>
                                <div class="content">
                                    <a href="#!">
                                        <p>November 27, 2021</p>
                                    </a>
                                    <a href="blog-detail-right.html">
                                        <h5>Only Lauryn Hill Could Make a Big Tulle Skirt and Cowboy Hat</h5>
                                    </a>
                                    <a href="blog-detail-left.html" class="read-more">read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="single-blog">
                                <div class="blog-img item-animation3">
                                    <span class="item-animation3a"></span>
                                    <img src="{{asset('front/assets/images/home1/blog/blog2.jpg')}}" alt="Blog Image"/>
                                </div>
                                <div class="content">
                                    <a href="#!">
                                        <p>November 27, 2021</p>
                                    </a>
                                    <a href="blog-detail-right.html">
                                        <h5>Meet the Former Model Designing Couture-Level Accessories</h5>
                                    </a>
                                    <a href="blog-detail-left.html" class="read-more">read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="single-blog">
                                <div class="blog-img item-animation3">
                                    <span class="item-animation3a"></span>
                                    <img src="{{asset('front/assets/images/home1/blog/blog3.jpg')}}" alt="Blog Image"/>
                                </div>
                                <div class="content">
                                    <a href="#!">
                                        <p>November 27, 2021</p>
                                    </a>
                                    <a href="blog-detail-right.html">
                                        <h5>A Novel Idea: This Summer’s Best Sun Hats Are Supersized</h5>
                                    </a>
                                    <a href="blog-detail-left.html" class="read-more">read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end blog area -->


  @endsection 
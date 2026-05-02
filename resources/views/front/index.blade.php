  @extends('front.layout.master')
  @section('title') Home @endsection
  @section('content')

  <!-- start banner area -->
  <section class="home1 banner" data-img="{{asset('front/assets/images/home1/banner.jpg')}}">
      <div class="banner-slider">
          @forelse ($slider as $sliders)
          <div class="slider-item">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-6 col-md-7">
                          <div class="text-area">
                              <h4 data-animation="fadeInUp" data-delay=".2s">{{$sliders->text}}</h4>
                              <h1 data-animation="fadeInUp" data-delay=".4s">{{$sliders->text}}</h1>
                              <p data-animation="fadeInUp" data-delay=".6s">{{$sliders->description}}</p>
                              <a href="shop-3-column-sidebar.html" class="button-style1" data-animation="fadeInUp" data-delay=".8s">shop now <span class="btn-dot"></span></a>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-5">
                          <div class="image-area image1" data-animation="fadeInRight" data-delay=".3s">
                              <img src="{{asset('admin/slider/'.$sliders->image)}}" alt="Banner Image" />
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          @empty
          <p>No Slider Found</p>
          @endforelse
      </div>
  </section>
  <!-- end banner area -->

  <!-- start feature area -->
  @include('front.include.feature')
  <!-- end feature area -->

  <!-- start shop area -->
  <section class="home1 category">
      <div class="container">
          <div class="row">

              <div class="col-lg-12">
                  <div class="section-title">
                      <h3>shop list</h3>
                  </div>
              </div>

              <div class="col-lg-12">
                  <div class="row">

                      <div class="col-xl-12 col-lg-12">
                          <div class="row">

                              @forelse ($shop as $shops)

                              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                                  <div class="single-category item-animation">

                                      <img src="{{ $shops->logo }}" alt="Shop Logo" />

                                      <div class="content">
                                          <h5>{{ $shops->shop_name }}</h5>
                                          <p>4 products</p>

                                          <a href="{{ route('shop.single', ['id' => $shops->id, 'slug' => $shops->shop_slug]) }}">
                                              view more
                                          </a>
                                      </div>

                                  </div>
                              </div>

                              @empty
                              <div class="col-12">
                                  <p>No Shop Found</p>
                              </div>
                              @endforelse

                          </div>
                      </div>

                  </div>
              </div>

          </div>
      </div>
  </section>
  <!-- end shop area -->

  <!-- start brand area -->
  <section class="home1 category">
      <div class="container">
          <div class="row">

              <div class="col-lg-12">
                  <div class="section-title">
                      <h3>product brands</h3>
                  </div>
              </div>

              <div class="col-lg-12">
                  <div class="row">

                      @forelse ($brand as $brands)

                      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                          <div class="single-category item-animation">

                              <img src="{{ $brands->image }}"
                                  alt="{{ $brands->brand_name }}" />

                              <div class="content">
                                  <h5>{{ $brands->brand_name }}</h5>
                                  <p>4 products</p>

                                  <a href="{{ route('brand.product', ['id' => $brands->id, 'slug' => $brands->slug]) }}">
                                      view more
                                  </a>
                              </div>

                          </div>
                      </div>

                      @empty
                      <div class="col-12">
                          <p>No Brand Found</p>
                      </div>
                      @endforelse

                  </div>
              </div>

          </div>
      </div>
  </section>
  <!-- end brand area -->

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
                      @forelse ($featured as $featureds)
                      <div class="col-lg-3">
                          <div class="single-product">
                              <div class="image-area">
                                  <img src="{{asset('vendor/product/'.$featureds->image)}}" class="img-main" alt="Product Image" />
                                  <img src="{{asset('vendor/product/'.$featureds->image)}}" class="img-hover" alt="Product Image" />
                                  <span class="sale-status">sale</span>
                                  <div class="action">
                                      <ul class="d-flex">
                                          <li>
                                              <a href="{{route('add.wishlist',$featureds->id)}}">
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
                                  <a href="{{route('product.single',array('id'=>$featureds->id,'slug'=>$featureds->product_slug))}}">
                                      <h5>{{$featureds->product_name}}</h5>
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
                      @empty
                      <p>No Product Found</p>
                      @endforelse
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
                      @forelse ($blog as $blogs)
                      <div class="col-lg-4 col-md-6 col-sm-6">
                          <div class="single-blog">
                              <div class="blog-img item-animation3">
                                  <span class="item-animation3a"></span>
                                  <img src="{{asset('admin/blog/'.$blogs->image)}}" alt="Blog Image" />
                              </div>
                              <div class="content">
                                  <a href="#!">
                                      <p>{{date('F d, Y',strtotime($blogs->created_at))}}</p>
                                  </a>
                                  <a href="blog-detail-right.html">
                                      <h5>{{$blogs->title}}</h5>
                                  </a>
                                  <a href="blog-detail-left.html" class="read-more">read more</a>
                              </div>
                          </div>
                      </div>
                      @empty
                      <p>No Blog Found</p>
                      @endforelse
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- end blog area -->


  @endsection
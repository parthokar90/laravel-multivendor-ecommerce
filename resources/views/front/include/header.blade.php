<header>
    <!-- start top-bar area -->
    <section class="home1 top-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <p>New Offers This Weekend only to Get 50% Flate</p>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="right-part d-flex justify-content-end">
                        <div class="select-area">
                            <select class="select">
                                <option value="0">USD</option>
                                <option value="1">CAD</option>
                                <option value="2">Rupee</option>
                                <option value="3">TK</option>
                            </select>
                        </div>
                        <div class="select-area">
                            <select class="select">
                                <option value="0">English</option>
                                <option value="1">Spanish</option>
                                <option value="2">Japanese</option>
                                <option value="3">British</option>
                            </select>
                        </div>
                        <div class="social-area">
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
    <!-- start top-bar area -->

    <!-- start mid-menu area -->
    <section class="home1 mid-menu">
        <div class="container ">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-2 col-sm-6 col-6 order-1 order-md-1">
                    <div class="logo">
                        <a href="{{route('home.page')}}">
                            <img src="{{asset('front/assets/images/home1/logo.png')}}" alt="Logo"/>
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 order-3 order-md-2">
                    <form action="{{route('product.search')}}" method="get">
                        <div class="form">
                            <div class="select-area">
                                <select class="select" name="cat_id">
                                    <option value="">all categories</option>
                                     @foreach($allCategory as $categorys)
                                      <option value="{{$categorys->id}}">{{$categorys->category_name}}</option>
                                     @endforeach  
                                </select>
                            </div>
                            <input type="search" name="search" placeholder="search for products..." class="inputs">
                        </div>
                        <button type="submit" class="button-style1">search<span class="btn-dot"></span></button>
                    </form>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-6 order-2 order-md-3">
                    <div class="notification">
                        <ul class="d-flex justify-content-end">
                                @if(Auth::guard('vendor')->check())
                                    @php $url=route('vendor.dashboard'); @endphp
                                 @elseif(Auth::guard('web')->check())
                                    @php $url=route('customer.dashboard'); @endphp
                                  @else 
                                    @php $url=route('customer.login'); @endphp
                                @endif
                            <li>
                                <a href="{{$url}}">
                                    <i class="flaticon-user-1"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('wishlist.index')}}">
                                    <i class="flaticon-heart"></i>
                                    <span class="quantity">{{$wishlistCount}}</span>
                                </a>
                            </li>
                            <li>
                                <div class="dropdown">
                                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="flaticon-shopping-cart"></i>
                                        <span class="quantity">{{$cartCount}}</span>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <div class="heading d-flex justify-content-between">
                                            <h5>{{$cartCount}} items</h5>
                                            <a href="{{route('cart.index')}}">view cart</a>
                                        </div>
                                        <ul>
                                            @foreach($cartItem as $item)
                                            <li>
                                                <div class="d-flex position-relative">
                                                    @if(isset($item->attributeType))
                                                      <img src="{{asset('vendor/product/attribute/'.$item->image)}}" alt="Product Image"/>
                                                    @else 
                                                      <img src="{{asset('vendor/product/'.$item->image)}}" alt="Product Image"/>
                                                    @endif
                                                    <div class="text">
                                                        <a href="shop-detail-left.html">
                                                            <h5>{{$item->product->product_name}}</h5>
                                                        </a>
                                                        @if(isset($item->attributeType))
                                                        <p>{{$item->attributeType->attribute_type}}: {{$item->attributeValue->attribute}}</p>
                                                        @endif 
                                                        <p>{{$item->quantity}} X {{number_format($item->price)}}</p>
                                                        <a href="#!" class="icon">
                                                            <i class="far fa-times-circle"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach 
                                        </ul>
                                        <div class="total d-flex justify-content-between">
                                            <p>total</p>
                                            <p>{{number_format($subTotal)}}</p>
                                        </div>
                                        <div class="check">
                                            <a href="checkout.html" class="button-style1">checkout <span class="btn-dot"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end mid-menu area -->

    <!-- start menu area -->
    <section class="home1 menubar position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5 col-sm-6 col-6">
                    <div class="category-menu-area">
                        <button class="category-btn">
                            <span>
                                browse categories
                                <i class="fas fa-caret-down"></i>
                            </span>
                            <i class="fas fa-bars bar-icon"></i>
                        </button>
                        <div class="menu-holder">
                            <ul class="categories">
                                @foreach($latestCategory as $categorys)
                                  <li><a href="{{route('category.product',array('id'=>$categorys->id,'slug'=>$categorys->slug))}}"><i class="flaticon-checked"></i>{{$categorys->category_name}}</a></li>
                                  <ul>
                                    @foreach($categorys->subCategory as $child)
                                      <li class="ml-2"><a href="{{route('category.product',array('id'=>$child->id,'slug'=>$child->slug))}}">{{$child->category_name}}</a></li>
                                    @endforeach
                                </ul>
                                @endforeach 
                            </ul> 
                            <ul class="categories">
                                <li><a href="{{route('all.category')}}"><i class="flaticon-checked"></i>View All Category</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7 col-sm-6 col-6">
                    <nav class="navbar p-0 position-static desktop-menu">
                        <div class="main-menu">
                            <ul class="menu">
                                <li class="active">
                                    <a href="{{route('home.page')}}">home</a>
                                </li>
                                <li><a href="#!">Account</a>
                                    <ul class="submenu-list">
                                        <li><a href="{{route('customer.login')}}">Customer Login</a></li>
                                        <li><a href="{{route('vendor.login')}}">Vendor Login</a></li>
                                    </ul>
                                </li>
                                <li><a href="#!">categories</a>
                                    <div class="mega-submenu">
                                        <div class="submenu-inside">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-lg-9">
                                                        <div class="row">
                                                            @foreach($parentCategory as $parent)
                                                                <div class="col-lg-3">
                                                                    <h4>{{$parent->category_name}}</h4>
                                                                    <ul>
                                                                        @foreach($parent->subCategory as $child)
                                                                          <li><a href="{{route('category.product',array('id'=>$child->id,'slug'=>$child->slug))}}">{{$child->category_name}}</a></li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                             @endforeach    
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="ad-part">
                                                            <div class="ad-slider">
                                                                <div class="item">
                                                                    <a href="shop-detail-left.html">
                                                                        <img src="{{asset('front/assets/images/home1/advertise.png')}}" alt="Advertise"/>
                                                                    </a>
                                                                </div>
                                                                <div class="item">
                                                                    <a href="shop-detail-left.html">
                                                                        <img src="{{asset('front/assets/images/home1/advertise2.png')}}" alt="Advertise"/>
                                                                    </a>
                                                                </div>
                                                                <div class="item">
                                                                    <a href="shop-detail-left.html">
                                                                        <img src="{{asset('front/assets/images/home1/advertise3.png')}}" alt="Advertise"/>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="!#">blog</a></li>
                                <li><a href="{{route('contact.page')}}">contact</a></li>
                            </ul>
                        </div>
                        <div class="right-part d-flex align-items-center">
                            <i class="flaticon-customer-service"></i>
                            <div class="text">
                                <p>call now</p>
                                <p>988. 876 76 76 8</p>
                            </div>
                        </div>
                    </nav>
                    <!-- mobile menu -->
                    <nav class="navbar p-0 mobile-menu position-static">
                        <div class="header-menu position-static">
                            <ul class="menu">
                                <li class="active">
                                    <a href="{{route('home.page')}}">home</a>
                                </li>
                                <li><a href="about.html">about</a></li>
                             
                                <li><a href="#!">Account</a>
                                    <ul class="submenu-list">
                                        <li><a href="{{route('customer.login')}}">Customer Login</a></li>
                                        <li><a href="{{route('vendor.login')}}">Vendor Login</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="#!">categorys</a>
                                    <ul>
                                        @foreach($parentCategory as $parent)
                                        <li>
                                            <a href="#!">{{$parent->category_name}}</a>
                                            <ul>
                                                @foreach($parent->subCategory as $child)
                                                <li><a href="{{route('category.product',array('id'=>$child->id,'slug'=>$child->slug))}}">{{$child->category_name}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        @endforeach  
                                    </ul>
                                </li>

                                <li>
                                    <a href="!#">blog</a>
                                </li>

                                <li><a href="{{route('contact.page')}}">contact</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Start category offcanvas -->
        <div class="mbl-offcanvas">
            <button class="mbl-canvas-cancle">
                <i class="far fa-times-circle"></i>
            </button>
            <div class="mbl-content">
            </div>
        </div>
        <!-- End category offcanvas -->
    </section>
    <!-- end menu area -->
</header>
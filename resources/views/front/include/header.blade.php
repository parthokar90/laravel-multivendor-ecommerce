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
                    <form action="#!">
                        <div class="form">
                            <div class="select-area">
                                <select class="select">
                                    <option value="">all categories</option>
                                     @foreach($allCategory as $categorys)
                                      <option value="{{$categorys->id}}">{{$categorys->category_name}}</option>
                                     @endforeach  
                                </select>
                            </div>
                            <input type="search" placeholder="search for products..." class="inputs">
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
                                                    <img src="{{asset('front/assets/images/home1/product/p1a.jpg')}}" alt="Product Image"/>
                                                    <div class="text">
                                                        <a href="shop-detail-left.html">
                                                            <h5>{{$item->product->product_name}}</h5>
                                                        </a>
                                                        @if(isset($item->attributeType))
                                                        <p>{{$item->attributeType->attribute_type}}: Red</p>
                                                        @endif 
                                                        <p>1 X $78.00</p>
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
                                            <p>$499.00</p>
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
                                <li><a href="shop-4-column-sidebar.html"><i class="flaticon-checked"></i>women's</a></li>
                                <li><a href="shop-3-column-sidebar.html"><i class="flaticon-checked"></i>men's</a></li>
                                <li><a href="shop-2-column-sidebar.html"><i class="flaticon-checked"></i>kid's</a></li>
                                <li><a href="shop-4-column-sidebar.html"><i class="flaticon-checked"></i>accessories</a></li>
                                <li><a href="shop-3-column-sidebar.html"><i class="flaticon-checked"></i>clothing</a></li>
                                <li><a href="shop-2-column-sidebar.html"><i class="flaticon-checked"></i>shoes</a></li>
                                <li><a href="shop-4-column-sidebar.html"><i class="flaticon-checked"></i>watches</a></li>
                                <li><a href="shop-3-column-sidebar.html"><i class="flaticon-checked"></i>jewellery</a></li>
                                <li><a href="shop-2-column-sidebar.html"><i class="flaticon-checked"></i>beauty</a></li>
                                <li><a href="shop-4-column-sidebar.html"><i class="flaticon-checked"></i>baby clothing</a></li>
                                <li><a href="shop-3-column-sidebar.html"><i class="flaticon-checked"></i>ethinic wear</a></li>
                                <li><a href="shop-2-column-sidebar.html"><i class="flaticon-checked"></i>seasonal wear</a></li>
                                <li><a href="shop-4-column-sidebar.html"><i class="flaticon-checked"></i>sleep wear</a></li>
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
                                <li><a href="#!">shop</a>
                                    <div class="mega-submenu">
                                        <div class="submenu-inside">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-lg-9">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                <h4>collections</h4>
                                                                <ul class="big-item">
                                                                 
                                                                    <li>
                                                                        <a href="shop-2-column-sidebar.html">
                                                                            Boishakhi collections
                                                                            <span>Available in shop from April 2021</span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="shop-4-column-sidebar.html">
                                                                            Puja collections
                                                                            <span>Available in shop from June 2021</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <h4>with sidebar</h4>
                                                                <ul>
                                                                    <li><a href="shop-2-column-sidebar.html">shop grid 2 columns</a></li>
                                                                    <li><a href="shop-3-column-sidebar.html">shop grid 3 columns</a></li>
                                                                    <li><a href="shop-4-column-sidebar.html">shop grid 4 columns</a></li>
                                                                    
                                                                    <li><a href="shop-list-left-sidebar.html">shop list left</a></li>
                                                                    <li><a href="shop-list-right-sidebar.html">shop list right</a></li>
                                                                    <li><a href="shop-right-sidebar.html">shop classic</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <h4>without sidebar</h4>
                                                                <ul>
                                                                    <li><a href="shop-2-column.html">shop grid 2 columns</a></li>
                                                                    <li><a href="shop-3-column.html">shop grid 3 columns</a></li>
                                                                    <li><a href="shop-4-column.html">shop grid 4 columns</a></li>
                                                                    <li><a href="shop-5-column.html">shop grid 5 columns</a></li>
                                                                    <li><a href="shop-full-width.html">shop full width</a></li>
                                                                    <li><a href="shop-list-left.html">shop list left</a></li>
                                                                    <li><a href="shop-list-right.html">shop list right</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <h4>shop pages</h4>
                                                                <ul>
                                                                    <li><a href="shop-detail-left.html">shop details left</a></li>
                                                                    <li><a href="shop-detail-right.html">shop details right</a></li>
                                                                    <li><a href="shop-detail-tab-left.html">shop details tab left</a></li>
                                                                    <li><a href="shop-detail-tab-right.html">shop details tab right</a></li>
                                                                    <li><a href="cart.html">cart</a></li>
                                                                    <li><a href="checkout.html">checkout</a></li>
                                                                    <li><a href="compare.html">compare</a></li>
                                                                    <li><a href="category.html">category</a></li>
                                                                    <li><a href="wishlist.html">wishlist</a></li>
                                                                </ul>
                                                            </div>
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
                                <li>
                                    <a href="#!">blog</a>
                                </li>
                                <li><a href="contact.html">contact</a></li>
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
                                <li>
                                    <a href="#!">account</a>
                                    <ul>
                                        <li>
                                            <ul>
                                                <li><a href="login.html">login</a></li>
                                                <li><a href="register.html">register</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="faq.html">FAQ</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#!">shop</a>
                                    <ul>
                                        <li>
                                            <a href="#!">collections</a>
                                            <ul>
                                                <li><a href="shop-4-column-sidebar.html">spring summer collections</a></li>
                                                <li><a href="shop-3-column-sidebar.html">fall winter collections</a></li>
                                                <li><a href="shop-2-column-sidebar.html">Boishakhi collections</a></li>
                                                <li><a href="shop-4-column-sidebar.html">puja collections</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#!">shop with sidebar</a>
                                            <ul>
                                                <li><a href="shop-2-column-sidebar.html">grid 2 columns</a></li>
                                                <li><a href="shop-3-column-sidebar.html">grid 3 columns</a></li>
                                                <li><a href="shop-4-column-sidebar.html">grid 4 columns</a></li>
                                                <li><a href="shop-list-left-sidebar.html">shop list left</a></li>
                                                <li><a href="shop-list-right-sidebar.html">shop list right</a></li>
                                                <li><a href="shop-right-sidebar.html">shop classic</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#!">shop without sidebar</a>
                                            <ul>
                                                <li><a href="shop-2-column.html">grid 2 columns</a></li>
                                                <li><a href="shop-3-column.html">grid 3 columns</a></li>
                                                <li><a href="shop-4-column.html">grid 4 columns</a></li>
                                                <li><a href="shop-5-column.html">grid 5 columns</a></li>
                                                <li><a href="shop-full-width.html">shop full width</a></li>
                                                <li><a href="shop-list-left.html">shop list left</a></li>
                                                <li><a href="shop-list-right.html">shop list right</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#!">shop pages</a>
                                            <ul>
                                                <li><a href="shop-detail-left.html">shop details left</a></li>
                                                <li><a href="shop-detail-right.html">shop details right</a></li>
                                                <li><a href="shop-detail-tab-left.html">shop details tab left</a></li>
                                                <li><a href="shop-detail-tab-right.html">shop details tab right</a></li>
                                                <li><a href="cart.html">cart</a></li>
                                                <li><a href="checkout.html">checkout</a></li>
                                                <li><a href="compare.html">compare</a></li>
                                                <li><a href="category.html">category</a></li>
                                                <li><a href="wishlist.html">wishlist</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="project.html">blog</a>
                                </li>
                                <li><a href="contact.html">contact</a></li>
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
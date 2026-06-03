@extends('front.layout.master')

@section('title') Contact @endsection

@section('content') 
    <!-- start banner area -->
    <section class="inner-page banner" data-img="{{asset('front/assets/images/banner.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>contact</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                          <li class="breadcrumb-item active" aria-current="page">contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- end banner area -->

     <!-- start address area -->
     <section class="contact-page address p80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6">
                            <div class="item text-center">
                                <i class="flaticon-placeholder"></i>
                                <h4>Our Office</h4>
                                <p>8273 NW 56th ST Miami, Florida, <br> 33195 United States</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mt-sm-30">
                            <div class="item text-center">
                                <i class="flaticon-phone"></i>
                                <h4>call us</h4>
                                <p>+8 123 456 +98709928</p>
                                <p>24/7 Hours Support</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mt-md-30">
                            <div class="item text-center">
                                <i class="flaticon-mail"></i>
                                <h4>email address</h4>
                                <p>demo@exaple.com</p>
                                <p>demo@exaple.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end address area -->

    <!-- start message area -->
    <section class="contact-page message">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bg text-center">
                        <h2>Leave a Message</h2>
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="name" class="inputs">
                                </div>
                                <div class="col-lg-6">
                                    <input type="email" placeholder="email" class="inputs">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="website" class="inputs">
                                </div>
                                <div class="col-lg-6">
                                    <input type="tel" placeholder="your phone" class="inputs">
                                </div>
                                <div class="col-lg-12">
                                    <textarea placeholder="write your comments" class="inputs"></textarea>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="button-style1">send message <span class="btn-dot"></span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end message area -->

    <!-- start map area -->
    <section class="contact-page location">
        <div class="google-map-wrapper" data-latitude='40.7656561' data-longitude='-73.7691858' data-zoom='11' data-marker='assets/images/map-pin.png'></div>
        <div id="map"></div>
    </section>
    <!-- end map area -->
@endsection
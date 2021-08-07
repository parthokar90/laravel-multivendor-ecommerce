@extends('front.layout.master')

@section('title') 404 @endsection

@section('content')
 <!-- start template -->
 <section class="error-page main2" data-img="{{asset('front/assets/images/404.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="error-area">
                    <p>It looks like you are lost</p>
                    <h2>Your cart is empty</h2>
                    <a href="{{route('home.page')}}" class="button-style1">return home page <span class="btn-dot"></span></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection 
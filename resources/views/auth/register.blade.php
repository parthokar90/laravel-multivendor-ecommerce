@extends('front.layout.master')

@section('title') Registration @endsection

@section('content')
 <!-- start banner area -->
 <section class="inner-page banner" data-img="{{asset('front/assets/images/banner.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Customer registration</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">register</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- end banner area -->

<!-- start account area -->
<section class="account-page account p80">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="item signin">
                    <h4>Create an Account</h4>
                    <p>Register here if you are a new customer.</p>
                    <form action="{{route('customer.registration.process')}}" method="post">
                        @csrf 
                        <input type="text" name="first_name" placeholder="First Name *" class="inputs" value="{{old('first_name')}}">

                         @if($errors->has('first_name'))
                          <span class="text-danger"> {{$errors->first('first_name')}}</span>
                         @endif

                        <input type="text" name="last_name" placeholder="Last Name *" class="inputs" value="{{old('last_name')}}">

                         @if($errors->has('last_name'))
                         <span class="text-danger"> {{$errors->first('last_name')}}</span>
                         @endif

                        <input type="email" name="email" placeholder="e-mail address *" class="inputs" value="{{old('email')}}">

                         @if($errors->has('email'))
                          <span class="text-danger"> {{$errors->first('email')}}</span>
                         @endif

                        <input type="password" name="password" placeholder="password *" class="inputs">

                         @if($errors->has('password'))
                          <span class="text-danger"> {{$errors->first('password')}}</span>
                         @endif

                        <input type="text" name="mobile" placeholder="Mobile No *" class="inputs" value="{{old('mobile')}}">

                        @if($errors->has('mobile'))
                        <span class="text-danger"> {{$errors->first('mobile')}}</span>
                        @endif
                         
                        <label for="terms2">
                            I have read and agree to the terms & conditions 
                            <input type="checkbox" name="terms" class="check" id="terms2">
                            <span class="check-custom"></span>
                        </label>
                        <button type="submit" class="button-style1">submit & register <span class="btn-dot"></span></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end account area -->
@endsection 
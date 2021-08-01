@extends('front.layout.master')

@section('title') Vendor Login @endsection

@section('content') 
   <!-- start banner area -->
   <section class="inner-page banner" data-img="{{asset('front/assets/images/banner.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Vendor Login</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Vendor Login</li>
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
                <div class="item login text-center">
                    <h4>Vendor Login</h4>
                    <span style="color:red">
                        @if(Session::has('message'))
                        {{ Session::get('message') }}
                       @endif
                    </span>
                    <form action="{{route('vendor.login.process')}}" method="post">
                        @csrf 
                        <input type="email" name="email" placeholder="e-mail address" class="inputs">
                        @error('email')
                         <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                         @enderror
                        <input type="password" name="password" placeholder="password" class="inputs">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                         </span>
                        @enderror
                        <div class="remember d-flex justify-content-between">
                            <label for="terms1">
                                remember me
                                <input type="checkbox" class="check" id="terms1">
                                <span class="check-custom"></span>
                            </label>
                            <a href="#!"><p>forgot password?</p></a>
                        </div>
                        <button type="submit" class="button-style1">login <span class="btn-dot"></span></button>
                    </form>
                    <span class="or">or</span>
                    <ul class="d-flex">
                        <li><a href="#!" class="fb">facebook</a></li>
                        <li><a href="#!" class="gl">google</a></li>
                        <li><a href="#!" class="tw">twitter</a></li>
                    </ul>
                    <h5>Don't Have an Account? <a href="{{route('vendor.registration')}}">Sign up now</a> </h5>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end account area -->
@endsection
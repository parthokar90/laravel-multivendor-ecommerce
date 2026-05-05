@extends('front.layout.master')

@section('title') Customer Login @endsection

@section('content') 

<!-- start banner area -->
<section class="inner-page banner" data-img="{{asset('front/assets/images/banner.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>login</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="{{route('home.page')}}">Home</a></li>
                      <li class="breadcrumb-item active">login</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- start account area -->
<section class="account-page account p80">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">

                <div class="item login text-center">
                    <h4>Login</h4>
                    <p>Login if you are a returning customer.</p>

                    {{-- default credentials box --}}
                    <div style="background:#f5f5f5;padding:10px;margin-bottom:15px;border-radius:5px;">
                        <p class="mb-1"><b>Demo Email:</b> customer@test.com</p>
                        <p class="mb-0"><b>Demo Password:</b> 123456</p>
                    </div>

                    <span style="color:red">
                        @if(Session::has('message'))
                            {{ Session::get('message') }}
                        @endif
                    </span>

                    <form action="{{route('customer.login.process')}}" method="post">
                        @csrf 

                        <input type="email" name="email" placeholder="e-mail address" class="inputs">
                        @error('email')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror

                        <input type="password" name="password" placeholder="password" class="inputs">
                        @error('password')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror

                        <div class="remember d-flex justify-content-between">
                            <label>
                                remember me
                                <input type="checkbox" class="check">
                                <span class="check-custom"></span>
                            </label>
                            <a href="#"><p>forgot password?</p></a>
                        </div>

                        <button type="submit" class="button-style1">
                            login <span class="btn-dot"></span>
                        </button>
                    </form>

                    <h5 class="mt-3">
                        Don't Have an Account? 
                        <a href="{{route('customer.registration')}}">Sign up now</a>
                    </h5>

                </div>

            </div>
        </div>
    </div>
</section>

@endsection
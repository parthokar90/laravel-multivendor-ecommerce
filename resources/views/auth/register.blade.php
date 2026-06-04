@extends('front.layout.master')

@section('title') Registration @endsection

@section('content')

<!-- start banner area -->
<section class="inner-page banner" data-img="{{ asset('front/assets/images/banner.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Customer Registration</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Register</li>
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

                    {{-- Success message --}}
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Error message --}}
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('customer.registration.process') }}" method="POST" novalidate>
                        @csrf

                        {{-- First Name --}}
                        <input
                            type="text"
                            name="first_name"
                            placeholder="First Name *"
                            class="inputs @error('first_name') is-invalid @enderror"
                            value="{{ old('first_name') }}"
                        >
                        @error('first_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        {{-- Last Name --}}
                        <input
                            type="text"
                            name="last_name"
                            placeholder="Last Name *"
                            class="inputs @error('last_name') is-invalid @enderror"
                            value="{{ old('last_name') }}"
                        >
                        @error('last_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        {{-- Email --}}
                        <input
                            type="email"
                            name="email"
                            placeholder="E-mail Address *"
                            class="inputs @error('email') is-invalid @enderror"
                            value="{{ old('email') }}"
                        >
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        {{-- Password --}}
                        <input
                            type="password"
                            name="password"
                            placeholder="Password *"
                            class="inputs @error('password') is-invalid @enderror"
                        >
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        {{-- Mobile --}}
                        <input
                            type="text"
                            name="mobile"
                            placeholder="Mobile No *"
                            class="inputs @error('mobile') is-invalid @enderror"
                            value="{{ old('mobile') }}"
                        >
                        @error('mobile')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        {{-- Terms & Conditions --}}
                        <label for="terms2">
                            I have read and agree to the terms &amp; conditions
                            <input
                                type="checkbox"
                                name="terms"
                                class="check @error('terms') is-invalid @enderror"
                                id="terms2"
                            >
                            <span class="check-custom"></span>
                        </label>
                        @error('terms')
                            <span class="text-danger d-block">{{ $message }}</span>
                        @enderror

                        <button type="submit" class="button-style1">
                            Submit &amp; Register <span class="btn-dot"></span>
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end account area -->

@endsection
@extends('front.layout.master')

@section('title') Registration @endsection

@section('content')

<section class="relative bg-cover bg-center py-20 text-white" style="background-image: url('{{ asset('front/assets/images/banner.jpg') }}');">
    <div class="absolute inset-0 bg-black/50"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold tracking-tight mb-3 capitalize">Vendor Registration</h2>
        <nav aria-label="breadcrumb">
            <ol class="inline-flex items-center justify-center space-x-2 text-sm font-medium">
                <li class="inline-flex items-center">
                    <a href="{{ route('home.page') }}" class="text-stone-300 hover:text-white transition">Home</a>
                </li>
                <li class="text-stone-400">/</li>
                <li class="text-amber-500 font-semibold" aria-current="page">Register</li>
            </ol>
        </nav>
    </div>
</section>

<section class="py-16 bg-stone-50 min-h-screen flex items-center">
    <div class="max-w-2xl w-full mx-auto px-4 sm:px-6">

        <div class="bg-white rounded-2xl border border-stone-200 shadow-sm p-8 space-y-6">

            <div class="text-center space-y-1">
                <h4 class="text-2xl font-bold tracking-tight text-stone-900">Create an Account</h4>
                <p class="text-sm text-stone-500">Register here if you are a new vendor.</p>
            </div>

            {{-- Display Custom Session Messages --}}
            @if(Session::has('message'))
            <div class="bg-rose-50 border border-rose-200 text-rose-600 text-sm px-4 py-3 rounded-xl flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 flex-shrink-0">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                </svg>
                <span>{{ Session::get('message') }}</span>
            </div>
            @endif

            <form action="{{ route('vendor.registration.process') }}" method="post" class="space-y-5">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    {{-- First Name --}}
                    <div class="space-y-1.5">
                        <label class="text-xs font-semibold uppercase tracking-wider text-stone-600">First Name *</label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="John"
                            class="w-full bg-white border @error('first_name') border-rose-500 focus:ring-rose-500/20 focus:border-rose-500 @else border-stone-200 focus:ring-amber-500/20 focus:border-amber-500 @enderror rounded-xl px-4 py-3 text-sm transition outline-none focus:ring-4">
                        @error('first_name')
                        <p class="text-xs font-medium text-rose-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Last Name --}}
                    <div class="space-y-1.5">
                        <label class="text-xs font-semibold uppercase tracking-wider text-stone-600">Last Name *</label>
                        <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Doe"
                            class="w-full bg-white border @error('last_name') border-rose-500 focus:ring-rose-500/20 focus:border-rose-500 @else border-stone-200 focus:ring-amber-500/20 focus:border-amber-500 @enderror rounded-xl px-4 py-3 text-sm transition outline-none focus:ring-4">
                        @error('last_name')
                        <p class="text-xs font-medium text-rose-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    {{-- Email --}}
                    <div class="space-y-1.5">
                        <label class="text-xs font-semibold uppercase tracking-wider text-stone-600">Email Address *</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="vendor@example.com"
                            class="w-full bg-white border @error('email') border-rose-500 focus:ring-rose-500/20 focus:border-rose-500 @else border-stone-200 focus:ring-amber-500/20 focus:border-amber-500 @enderror rounded-xl px-4 py-3 text-sm transition outline-none focus:ring-4">
                        @error('email')
                        <p class="text-xs font-medium text-rose-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Mobile --}}
                    <div class="space-y-1.5">
                        <label class="text-xs font-semibold uppercase tracking-wider text-stone-600">Mobile No *</label>
                        <input type="text" name="mobile" value="{{ old('mobile') }}" placeholder="e.g., +8801XXXXXXXXX"
                            class="w-full bg-white border @error('mobile') border-rose-500 focus:ring-rose-500/20 focus:border-rose-500 @else border-stone-200 focus:ring-amber-500/20 focus:border-amber-500 @enderror rounded-xl px-4 py-3 text-sm transition outline-none focus:ring-4">
                        @error('mobile')
                        <p class="text-xs font-medium text-rose-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Shop Name --}}
                <div class="space-y-1.5">
                    <label class="text-xs font-semibold uppercase tracking-wider text-stone-600">Shop Name *</label>
                    <input type="text" name="shop_name" value="{{ old('shop_name') }}" placeholder="e.g., Global Tech Store"
                        class="w-full bg-white border @error('shop_name') border-rose-500 focus:ring-rose-500/20 focus:border-rose-500 @else border-stone-200 focus:ring-amber-500/20 focus:border-amber-500 @enderror rounded-xl px-4 py-3 text-sm transition outline-none focus:ring-4">
                    @error('shop_name')
                    <p class="text-xs font-medium text-rose-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    {{-- Password --}}
                    <div class="space-y-1.5">
                        <label class="text-xs font-semibold uppercase tracking-wider text-stone-600">Password *</label>
                        <input type="password" name="password" placeholder="••••••••"
                            class="w-full bg-white border @error('password') border-rose-500 focus:ring-rose-500/20 focus:border-rose-500 @else border-stone-200 focus:ring-amber-500/20 focus:border-amber-500 @enderror rounded-xl px-4 py-3 text-sm transition outline-none focus:ring-4">
                        @error('password')
                        <p class="text-xs font-medium text-rose-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Confirm Password --}}
                    <div class="space-y-1.5">
                        <label class="text-xs font-semibold uppercase tracking-wider text-stone-600">Confirm Password *</label>
                        <input type="password" name="password_confirmation" placeholder="••••••••"
                            class="w-full bg-white border border-stone-200 focus:ring-amber-500/20 focus:border-amber-500 rounded-xl px-4 py-3 text-sm transition outline-none focus:ring-4">
                    </div>
                </div>

                {{-- Terms & Conditions --}}
                <div class="flex flex-col space-y-1 pt-2">
                    <label class="flex items-center space-x-2.5 cursor-pointer select-none text-stone-600">
                        <input type="checkbox" name="terms" id="terms2" {{ old('terms') ? 'checked' : '' }}
                            class="w-4 h-4 rounded border-stone-300 text-amber-600 focus:ring-amber-500 focus:ring-offset-0 cursor-pointer">
                        <span>I have read and agree to the <a href="#" class="font-medium text-stone-900 hover:text-amber-600 underline transition">terms & conditions</a></span>
                    </label>
                    @error('terms')
                    <p class="text-xs font-medium text-rose-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit Button --}}
                <div class="pt-2">
                    <button type="submit" class="w-full bg-stone-900 hover:bg-amber-600 text-white font-bold uppercase tracking-wider py-3.5 px-4 rounded-xl shadow-sm hover:shadow transition duration-300">
                        Submit & Register
                    </button>
                </div>
            </form>

            <div class="border-t border-stone-100 pt-4 text-center">
                <p class="text-sm text-stone-600">
                    Already have a portal?
                    <a href="{{ route('vendor.login') }}" class="font-bold text-stone-900 hover:text-amber-600 transition">Login here</a>
                </p>
            </div>

        </div>

    </div>
</section>

@endsection
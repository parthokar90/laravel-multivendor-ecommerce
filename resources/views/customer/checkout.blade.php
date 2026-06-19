@extends('front.layout.master')

@section('title') Checkout @endsection

@section('content')

<section class="py-12 bg-stone-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Guest State: Show Login Prompts and Social Options --}}
        @guest
        <div class="mb-8 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="p-5 bg-amber-50 border border-amber-200 rounded-xl flex items-center justify-between shadow-sm">
                <div class="flex items-center space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span class="text-sm text-stone-700 font-medium">Already have an account?</span>
                </div>
                <a href="{{ route('login') }}" class="text-xs font-bold uppercase tracking-wider text-stone-900 hover:text-amber-600 transition">
                    Log in &rarr;
                </a>
            </div>

            <div class="p-4 bg-white border border-stone-200 rounded-xl flex items-center justify-center gap-3 shadow-sm">
                <a href="#" class="inline-flex items-center justify-center space-x-2 bg-white border border-stone-200 hover:bg-stone-50 text-stone-700 text-xs font-bold uppercase tracking-wider py-2.5 px-4 rounded-lg transition shadow-2xs w-full">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4" />
                        <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853" />
                        <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l3.66-2.85z" fill="#FBBC05" />
                        <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.85c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335" />
                    </svg>
                    <span>Google</span>
                </a>

                <a href="#" class="inline-flex items-center justify-center space-x-2 bg-[#1877F2] hover:bg-[#166FE5] text-white text-xs font-bold uppercase tracking-wider py-2.5 px-4 rounded-lg transition shadow-2xs w-full">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                    </svg>
                    <span>Facebook</span>
                </a>
            </div>
        </div>
        @endguest

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

            {{-- LEFT: SHIPPING & DELIVERY DETAILS --}}
            <div class="lg:col-span-7">
                <div class="bg-white rounded-xl border border-stone-200 shadow-sm overflow-hidden">
                    <div class="bg-stone-900 px-6 py-4">
                        <h5 class="text-white text-lg font-semibold tracking-wide">Delivery Details</h5>
                    </div>

                    <div class="p-6">
                        @auth
                        <div class="mb-6 p-4 bg-stone-50 border border-stone-200 rounded-xl flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-stone-200 text-stone-800 font-bold rounded-full flex items-center justify-center uppercase">
                                    {{ substr(auth()->user()->name ?? auth()->user()->first_name, 0, 1) }}
                                </div>
                                <div>
                                    <h6 class="text-sm font-bold text-stone-900">{{ auth()->user()->name ?? (auth()->user()->first_name . ' ' . auth()->user()->last_name) }}</h6>
                                    <p class="text-xs text-stone-500">{{ auth()->user()->email }}</p>
                                </div>
                            </div>
                            <span class="bg-emerald-50 text-emerald-700 border border-emerald-200 text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded-md">
                                Logged In
                            </span>
                        </div>
                        @endauth

                        <form action="{{ route('order.place') }}" method="POST" class="space-y-6">
                            @csrf

                            {{-- Show full contact form only if guest --}}
                            @guest
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-600 mb-1.5">Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}" required
                                        class="w-full bg-white border border-stone-300 text-stone-900 rounded-lg px-4 py-2.5 text-sm focus:ring-1 focus:ring-stone-900 focus:border-stone-900 outline-none transition">
                                </div>

                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-600 mb-1.5">Email</label>
                                    <input type="email" name="email" value="{{ old('email') }}" required
                                        class="w-full bg-white border border-stone-300 text-stone-900 rounded-lg px-4 py-2.5 text-sm focus:ring-1 focus:ring-stone-900 focus:border-stone-900 outline-none transition">
                                </div>
                            </div>
                            @endguest

                            {{-- Always required fields for order processing --}}
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-600 mb-1.5">Phone Number</label>
                                    <input type="text" name="phone"
                                        value="{{ auth()->check() ? auth()->user()->mobile : old('phone') }}"
                                        placeholder="e.g., +8801XXXXXXXXX" required
                                        class="w-full bg-white border border-stone-300 text-stone-900 rounded-lg px-4 py-2.5 text-sm focus:ring-1 focus:ring-stone-900 focus:border-stone-900 outline-none transition">
                                </div>

                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-600 mb-1.5">Complete Delivery Address</label>
                                    <textarea name="address" rows="4" required
                                        placeholder="House/Apartment no., Road, Area, City"
                                        class="w-full bg-white border border-stone-300 text-stone-900 rounded-lg px-4 py-2.5 text-sm focus:ring-1 focus:ring-stone-900 focus:border-stone-900 outline-none transition resize-none">{{ auth()->check() ? auth()->user()->address : old('address') }}</textarea>
                                </div>
                            </div>

                            <div class="pt-2">
                                <button type="submit" class="w-full bg-stone-900 hover:bg-stone-800 text-white text-xs font-bold uppercase tracking-widest py-3.5 px-6 rounded-xl shadow-md transition duration-300">
                                    Place Order Securely
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            {{-- RIGHT: ORDER SUMMARY --}}
            <div class="lg:col-span-5">
                <div class="bg-white rounded-xl border border-stone-200 shadow-sm overflow-hidden sticky top-6">

                    <div class="bg-stone-50 border-b border-stone-200 px-6 py-4">
                        <h5 class="text-stone-900 text-base font-bold uppercase tracking-wider">Your Order</h5>
                    </div>

                    <div class="p-6">
                        <div class="divide-y divide-stone-100 max-h-[380px] overflow-y-auto pr-1">
                            @if(!empty($cart) && count($cart) > 0)
                            @foreach($cart as $key => $item)
                            @php
                            $price = $item['price'] ?? 0;
                            $qty = $item['quantity'] ?? 1;
                            $name = $item['product_name'] ?? 'Unknown Product';
                            $image = $item['image'] ?? 'default.png';
                            @endphp

                            <div class="flex justify-between items-center py-3 first:pt-0 last:pb-0">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 flex-shrink-0 bg-stone-50 border border-stone-200 rounded-lg overflow-hidden p-0.5">
                                        <img src="{{ asset($image) }}" class="w-full h-full object-cover rounded" alt="{{ $name }}">
                                    </div>
                                    <div>
                                        <h6 class="font-semibold text-stone-900 text-sm line-clamp-1">{{ $name }}</h6>
                                        <span class="text-xs text-stone-400 font-medium">Qty: {{ $qty }}</span>
                                    </div>
                                </div>
                                <div class="text-sm font-bold text-stone-800 whitespace-nowrap pl-4">
                                    ৳ {{ number_format($price * $qty) }}
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="text-center py-6 text-stone-400 font-medium text-sm">
                                Cart is empty
                            </div>
                            @endif
                        </div>

                        <div class="border-t border-stone-200 mt-4 pt-4 flex justify-between items-baseline">
                            <h5 class="text-stone-900 font-bold text-base">Total</h5>
                            <h5 class="text-stone-900 font-black text-xl">৳ {{ number_format($subTotal ?? 0) }}</h5>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>

@endsection
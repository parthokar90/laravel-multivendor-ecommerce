@extends('front.layout.master')

@section('title') Checkout @endsection

@section('content')

<section class="py-12 bg-stone-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

            {{-- LEFT: BILLING FORM (7 Columns) --}}
            <div class="lg:col-span-7">
                <div class="bg-white rounded-xl border border-stone-200 shadow-sm overflow-hidden">
                    <div class="bg-stone-900 px-6 py-4">
                        <h5 class="text-white text-lg font-semibold tracking-wide">Billing Details</h5>
                    </div>

                    <div class="p-6">
                        <form action="{{ route('order.place') }}" method="POST">
                            @csrf

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">

                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-600 mb-1.5">Name</label>
                                    <input type="text" name="name" required
                                        class="w-full bg-white border border-stone-300 text-stone-900 rounded-lg px-4 py-2.5 text-sm focus:ring-1 focus:ring-stone-900 focus:border-stone-900 outline-none transition">
                                </div>

                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-600 mb-1.5">Email</label>
                                    <input type="email" name="email" required
                                        class="w-full bg-white border border-stone-300 text-stone-900 rounded-lg px-4 py-2.5 text-sm focus:ring-1 focus:ring-stone-900 focus:border-stone-900 outline-none transition">
                                </div>

                                <div class="md:col-span-2">
                                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-600 mb-1.5">Phone</label>
                                    <input type="text" name="phone" required
                                        class="w-full bg-white border border-stone-300 text-stone-900 rounded-lg px-4 py-2.5 text-sm focus:ring-1 focus:ring-stone-900 focus:border-stone-900 outline-none transition">
                                </div>

                                <div class="md:col-span-2">
                                    <label class="block text-xs font-bold uppercase tracking-wider text-stone-600 mb-1.5">Address</label>
                                    <textarea name="address" rows="3" required
                                        class="w-full bg-white border border-stone-300 text-stone-900 rounded-lg px-4 py-2.5 text-sm focus:ring-1 focus:ring-stone-900 focus:border-stone-900 outline-none transition resize-none"></textarea>
                                </div>

                            </div>

                            <button type="submit" class="w-full inline-flex items-center justify-center bg-stone-900 hover:bg-amber-600 text-white text-sm font-bold uppercase tracking-wider py-3 px-6 rounded-lg shadow-sm transition duration-300 text-center">
                                Place Order
                            </button>

                        </form>
                    </div>
                </div>
            </div>

            {{-- RIGHT: ORDER SUMMARY (5 Columns) --}}
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
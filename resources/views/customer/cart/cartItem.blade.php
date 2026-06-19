@extends('front.layout.master')

@section('title') Cart Item @endsection

@section('content')

<section class="py-12 bg-stone-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

            {{-- LEFT: CART TABLE (8 Columns) --}}
            <div class="lg:col-span-8">
                <form action="{{ route('cart.update') }}" method="POST">
                    @csrf

                    <div class="bg-white rounded-xl border border-stone-200 shadow-sm overflow-hidden">
                        <div class="bg-stone-900 px-6 py-4">
                            <h5 class="text-white text-lg font-semibold tracking-wide">Your Cart Items</h5>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse align-middle">
                                <thead class="bg-stone-50 border-b border-stone-200 text-stone-700 text-xs font-bold uppercase tracking-wider">
                                    <tr>
                                        <th class="px-6 py-4">Product</th>
                                        <th class="px-4 py-4 text-center">Price</th>
                                        <th class="px-4 py-4 text-center">Qty</th>
                                        <th class="px-4 py-4 text-center">Total</th>
                                        <th class="px-6 py-4 text-right">Action</th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-stone-100 text-sm text-stone-800">
                                    @forelse($cartItems as $key => $item)
                                    <tr class="hover:bg-stone-50/50 transition">

                                        {{-- PRODUCT --}}
                                        <td class="px-6 py-5">
                                            <div class="flex items-center space-x-4">
                                                <div class="w-16 h-16 flex-shrink-0 bg-stone-100 rounded-lg p-1 border border-stone-200 overflow-hidden">
                                                    <img class="w-full h-full object-cover rounded" src="{{ asset($item['image']) }}" alt="{{ $item['product_name'] }}">
                                                </div>
                                                <div>
                                                    <span class="font-semibold text-stone-900 block mb-0.5">{{ $item['product_name'] }}</span>
                                                    @if(!empty($item['attribute']))
                                                    <span class="text-xs text-stone-400 bg-stone-100 px-2 py-0.5 rounded inline-block font-medium">
                                                        {{ $item['attribute'] }}
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>

                                        {{-- PRICE --}}
                                        <td class="px-4 py-5 text-center font-medium text-stone-600 whitespace-nowrap">
                                            ৳ {{ number_format($item['price']) }}
                                        </td>

                                        {{-- QTY --}}
                                        <td class="px-4 py-5 text-center">
                                            <div class="w-20 mx-auto">
                                                <input type="number"
                                                    name="quantity[{{ $key }}]"
                                                    value="{{ $item['quantity'] }}"
                                                    min="1"
                                                    class="w-full bg-white border border-stone-300 text-stone-900 text-center rounded-md px-2 py-1.5 focus:ring-1 focus:ring-stone-900 focus:border-stone-900 outline-none transition text-sm font-semibold">
                                            </div>
                                        </td>

                                        {{-- TOTAL --}}
                                        <td class="px-4 py-5 text-center font-bold text-stone-900 whitespace-nowrap">
                                            ৳ {{ number_format($item['price'] * $item['quantity']) }}
                                        </td>

                                        {{-- DELETE ACTION --}}
                                        <td class="px-6 py-5 text-right">
                                            <a href="{{ route('cart.destroy', $key) }}"
                                                class="inline-flex items-center justify-center w-8 h-8 rounded-full border border-rose-100 text-rose-500 bg-rose-50/30 hover:bg-rose-50 hover:text-rose-600 transition duration-200 text-xs font-bold"
                                                onclick="return confirm('Remove item?')">
                                                ✕
                                            </a>
                                        </td>

                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-12 text-center text-stone-400 font-medium">
                                            <div class="flex flex-col items-center justify-center space-y-2">
                                                <span class="text-3xl">🛒</span>
                                                <span>Your cart is empty.</span>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        @if(count($cartItems) > 0)
                        <div class="bg-stone-50 border-t border-stone-200 px-6 py-4 text-right">
                            <button type="submit" class="bg-stone-900 text-white text-xs font-semibold px-4 py-2.5 rounded-lg shadow-sm uppercase tracking-wider">
                                Update Cart
                            </button>
                        </div>
                        @endif

                    </div>
                </form>
            </div>

            {{-- RIGHT: SUMMARY (4 Columns) --}}
            <div class="lg:col-span-4">
                <div class="bg-white rounded-xl border border-stone-200 shadow-sm overflow-hidden sticky top-6">

                    <div class="bg-stone-50 border-b border-stone-200 px-6 py-4">
                        <h5 class="text-stone-900 text-base font-bold uppercase tracking-wider">Order Summary</h5>
                    </div>

                    <div class="p-6 space-y-4">
                        <div class="flex justify-between text-sm">
                            <span class="text-stone-500">Subtotal</span>
                            <span class="font-semibold text-stone-900">৳ {{ number_format($subTotal) }}</span>
                        </div>

                        <div class="flex justify-between text-sm">
                            <span class="text-stone-500">Shipping</span>
                            <span class="font-semibold text-emerald-600 uppercase tracking-wide text-xs bg-emerald-50 px-2 py-0.5 rounded">Free</span>
                        </div>

                        <div class="border-t border-stone-100 pt-4 flex justify-between items-baseline">
                            <h5 class="text-stone-900 font-bold text-base">Total</h5>
                            <h5 class="text-stone-900 font-black text-xl">৳ {{ number_format($subTotal) }}</h5>
                        </div>
                    </div>

                    <div class="px-6 pb-6">
                        <a href="{{ route('checkout.page') }}"
                            class="bg-stone-900 text-white text-xs font-semibold px-4 py-2.5 rounded-lg shadow-sm uppercase tracking-wider">
                            Proceed to Checkout
                        </a>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>

@endsection
@extends('front.layout.master')

@section('title') Category Product @endsection

@section('content') 

<section class="relative bg-cover bg-center py-20 text-white" style="background-image: url('{{ asset('front/assets/images/banner.jpg') }}');">
    <div class="absolute inset-0 bg-black/50"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold tracking-tight mb-3">Category Product</h2>
        <nav aria-label="breadcrumb">
            <ol class="inline-flex items-center justify-center space-x-2 text-sm font-medium">
                <li class="inline-flex items-center">
                    <a href="{{ route('home.page') }}" class="text-stone-300 hover:text-white transition">Home</a>
                </li>
                <li class="text-stone-400">/</li>
                <li class="text-amber-500 font-semibold" aria-current="page">Shop</li>
            </ol>
        </nav>
    </div>
</section>

<section class="py-12 bg-stone-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        @include('message.message')
        
        <div class="grid grid-cols-1 gap-8">
            <div class="w-full">
                <div class="space-y-6">
                    
                    <div class="bg-white rounded-xl border border-stone-200 px-6 py-4 flex justify-between items-center shadow-sm">
                        <h4 class="text-sm font-bold uppercase tracking-wider text-stone-700">Home / Shop</h4>
                        <div class="flex items-center space-x-3 text-stone-400">
                            <a href="shop-list-left.html" class="hover:text-stone-900 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                </svg>
                            </a>
                            <a href="shop-4-column.html" class="text-stone-900 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25z" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        {{-- নিশ্চিত করা হচ্ছে যে $category আসলেই লুপ চালানোর মতো ডাটা ধারণ করে এবং তা বুলিয়ান নয় --}}
                        @if(is_iterable($category))
                            @forelse ($category as $item)
                                {{-- যদি $item অবজেক্ট না হয় বা এর ভেতর product রিলেশন না থাকে তবে স্কিপ করবে --}}
                                @if(is_object($item) && isset($item->product) && is_object($item->product))
                                    @php
                                        $product = $item->product;
                                    @endphp
                                    <div class="group bg-white rounded-xl border border-stone-200 overflow-hidden shadow-sm hover:shadow-md transition duration-300 flex flex-col justify-between">
                                        
                                        <div class="relative bg-stone-50 overflow-hidden aspect-square flex items-center justify-center p-4">
                                            <a href="{{ route('product.single', ['id' => $product->id, 'slug' => $product->product_slug]) }}" class="w-full h-full block">
                                                <img src="{{ $product->image ?? asset('front/assets/images/default.png') }}" class="w-full h-full object-cover rounded-lg group-hover:scale-105 transition duration-500" alt="{{ $product->product_name }}"/>
                                            </a>

                                            <span class="absolute top-3 left-3 bg-rose-500 text-white text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded-full shadow-sm">
                                                Sale
                                            </span>

                                            <div class="absolute bottom-3 left-1/2 -translate-x-1/2 bg-white/90 backdrop-blur-sm px-3 py-2 rounded-xl shadow-lg border border-stone-100 flex items-center space-x-4 opacity-0 group-hover:opacity-100 translate-y-2 group-hover:translate-y-0 transition duration-300">
                                                <a href="{{ route('add.wishlist', $product->id) }}" class="text-stone-600 hover:text-rose-500 transition" title="Add to Wishlist">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                                    </svg>
                                                </a>

                                                <span class="w-[1px] h-4 bg-stone-300"></span>

                                                <a href="{{ route('product.single', ['id' => $product->id, 'slug' => $product->product_slug]) }}" class="text-stone-600 hover:text-stone-900 transition" title="Quick View">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="p-5 flex-1 flex flex-col justify-between space-y-3">
                                            <div class="space-y-1.5">
                                                <ul class="flex space-x-0.5 text-amber-400 text-xs">
                                                    @for ($i = 0; $i < 5; $i++)
                                                        <li><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-3.5 h-3.5"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg></li>
                                                    @endfor
                                                </ul>

                                                <a href="{{ route('product.single', ['id' => $product->id, 'slug' => $product->product_slug]) }}" class="block">
                                                    <h5 class="text-sm font-semibold text-stone-900 group-hover:text-amber-600 transition line-clamp-2 h-10 leading-tight">
                                                        {{ $product->product_name ?? 'Unnamed Product' }}
                                                    </h5>
                                                </a>

                                                <p class="text-sm font-bold text-stone-900">
                                                    ৳ {{ number_format($product->sale_price ?? 0) }}
                                                </p>
                                            </div>

                                            <div class="pt-2">
                                                <a href="{{ route('product.single', ['id' => $product->id, 'slug' => $product->product_slug]) }}" 
                                                   class="w-full inline-flex items-center justify-center bg-stone-900 hover:bg-amber-600 text-white text-xs font-bold uppercase tracking-wider py-2.5 px-4 rounded-lg shadow-sm transition duration-300">
                                                    Read More
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @empty
                                <div class="col-span-full bg-white border border-stone-200 rounded-xl py-16 text-center text-stone-400 font-medium">
                                    <span class="text-3xl block mb-2">📦</span>
                                    No Product Found
                                </div>
                            @endforelse
                        @else
                            <div class="col-span-full bg-white border border-stone-200 rounded-xl py-16 text-center text-stone-400 font-medium">
                                <span class="text-3xl block mb-2">📦</span>
                                No Product Found
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>
@endsection
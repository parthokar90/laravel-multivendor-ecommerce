@extends('front.layout.master')

@section('content')

<section class="relative bg-cover bg-center py-20 text-white" style="background-image: url('{{ asset('front/assets/images/banner.jpg') }}');">
    <div class="absolute inset-0 bg-black/50"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold tracking-tight mb-3">{{ $shop->shop_name }}</h2>
        <nav aria-label="breadcrumb">
            <ol class="inline-flex items-center justify-center space-x-2 text-sm font-medium">
                <li class="inline-flex items-center">
                    <a href="{{ route('home.page') }}" class="text-stone-300 hover:text-white transition">Home</a>
                </li>
                <li class="text-stone-400">/</li>
                <li class="text-amber-500 font-semibold" aria-current="page">
                    {{ $shop->shop_name }}
                </li>
            </ol>
        </nav>
    </div>
</section>

<section class="py-12 bg-stone-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            
            @forelse ($shop->products as $products)
            <div class="group bg-white rounded-xl border border-stone-200 overflow-hidden shadow-sm hover:shadow-md transition duration-300 flex flex-col justify-between">
                
                <div class="relative bg-stone-50 overflow-hidden aspect-square flex items-center justify-center p-4">
                    <a href="{{ route('product.single', ['id' => $products->id, 'slug' => $products->product_slug]) }}" class="w-full h-full block">
                        <img src="{{ $products->image }}" 
                             class="w-full h-full object-cover rounded-lg group-hover:scale-105 transition duration-500" 
                             alt="{{ $products->product_name }}">
                    </a>
                </div>

                <div class="p-5 flex-1 flex flex-col justify-between space-y-3">
                    <div class="space-y-1.5 text-center">
                        
                        <a href="{{ route('product.single', ['id' => $products->id, 'slug' => $products->product_slug]) }}" class="block">
                            <h5 class="text-sm font-semibold text-stone-900 group-hover:text-amber-600 transition line-clamp-2 h-10 leading-tight">
                                {{ $products->product_name }}
                            </h5>
                        </a>

                        @if($products->sale_price)
                        <p class="text-base font-bold text-stone-900">
                            ৳ {{ number_format($products->sale_price) }}
                        </p>
                        @else
                        <p class="text-sm text-stone-400 italic">Price on call</p>
                        @endif
                    </div>

                    <div class="pt-2">
                        <a href="{{ route('product.single', ['id' => $products->id, 'slug' => $products->product_slug]) }}" 
                           class="w-full inline-flex items-center justify-center bg-stone-900 hover:bg-amber-600 text-white text-xs font-bold uppercase tracking-wider py-2.5 px-4 rounded-lg shadow-sm transition duration-300">
                            View Details
                        </a>
                    </div>
                </div>

            </div>
            @empty
            <div class="col-span-full bg-white border border-stone-200 rounded-xl py-16 text-center text-stone-400 font-medium">
                <span class="text-3xl block mb-2">📦</span>
                No Product Found
            </div>
            @endforelse

        </div>

    </div>
</section>

@endsection
@extends('front.layout.master')

@section('title') Product Details @endsection

@section('content')

<section class="relative bg-cover bg-center py-20 text-white" style="background-image: url('{{ asset('front/assets/images/banner.jpg') }}');">
    <div class="absolute inset-0 bg-black/50"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold tracking-tight mb-3">{{ $product->product_name }}</h2>

        <nav aria-label="breadcrumb">
            <ol class="inline-flex items-center justify-center space-x-2 text-sm font-medium">
                <li class="inline-flex items-center">
                    <a href="{{ route('home.page') }}" class="text-stone-300 hover:text-white transition">Home</a>
                </li>
                <li class="text-stone-400">/</li>
                <li class="text-amber-500 font-semibold" aria-current="page">Product</li>
            </ol>
        </nav>
    </div>
</section>


<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 lg:gap-12">

            <div class="md:col-span-5 flex justify-center items-start">
                <div class="w-full bg-stone-50 rounded-2xl p-4 border border-stone-100 overflow-hidden shadow-sm">
                    <img src="{{ $product->image }}"
                        class="w-full h-auto object-cover rounded-xl transition duration-300 hover:scale-[1.02]"
                        alt="{{ $product->product_name }}">
                </div>
            </div>

            <div class="md:col-span-7">
                <form action="{{ route('cart.store') }}" method="post" class="space-y-6">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <div class="space-y-4">
                        <div>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold tracking-wide uppercase
                                {{ $product->stock_status == 1 ? 'bg-emerald-100 text-emerald-800' : 'bg-rose-100 text-rose-800' }}">
                                {{ $product->stock_status == 1 ? 'In Stock' : 'Out of Stock' }}
                            </span>
                        </div>

                        <h1 class="text-2xl md:text-3xl font-bold text-stone-900 leading-tight">
                            {{ $product->product_name }}
                        </h1>

                        <div class="flex items-baseline space-x-3">
                            <span class="text-2xl font-bold text-stone-900">৳ {{ number_format($product->sale_price) }}</span>
                            @if($product->regular_price > 0)
                            <span class="text-lg text-stone-400 line-through">৳ {{ number_format($product->regular_price) }}</span>
                            @endif
                        </div>

                        <p class="text-stone-600 text-sm leading-relaxed border-b border-stone-100 pb-5">
                            {{ $product->short_description }}
                        </p>

                        @if($product->productAttributeValue->isNotEmpty())
                        <div class="space-y-3 pt-2">
                            <span class="text-xs font-bold uppercase tracking-wider text-stone-500 block">Select Attribute:</span>
                            <div class="flex flex-wrap gap-3">
                                @foreach($product->productAttributeValue as $value)
                                <label class="relative flex items-center justify-center px-4 py-2 rounded-lg border border-stone-200 cursor-pointer text-sm font-medium text-stone-700 bg-white hover:bg-stone-50 has-[:checked]:border-stone-900 has-[:checked]:bg-stone-900 has-[:checked]:text-white transition duration-200">
                                    <input type="radio" name="attribute" value="{{ $value->value_id }}" class="sr-only">
                                    <span>{{ $value->attributeValue->attribute ?? 'N/A' }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <div class="flex flex-wrap items-center gap-4 pt-4 border-t border-stone-100">
                            <div class="w-24">
                                <input type="number"
                                    name="quantity"
                                    value="1"
                                    min="1"
                                    class="w-full bg-white border border-stone-300 text-stone-900 rounded-lg px-3 py-2.5 text-center focus:ring-1 focus:ring-stone-900 focus:border-stone-900 outline-none transition text-sm font-semibold">
                            </div>

                            <div class="flex-none">
                                <button type="submit" class="bg-stone-900 text-white text-xs font-semibold px-4 py-2.5 rounded-lg shadow-sm uppercase tracking-wider">
                                    Add to Cart
                                </button>
                            </div>

                            <div>
                                <a href="{{ route('add.wishlist', $product->id) }}" class="inline-flex items-center justify-center p-2.5 rounded-lg border border-rose-200 text-rose-500 hover:bg-rose-50 transition duration-200" title="Add to Wishlist">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <div class="mt-8 pt-6 border-t border-stone-100 space-y-2 text-sm text-stone-600">
                            <div class="flex"><span class="w-24 font-semibold text-stone-900">Vendor:</span> <span>{{ optional($product->vendor)->first_name ? optional($product->vendor)->first_name . ' ' . optional($product->vendor)->last_name : 'Default Vendor' }}</span></div>
                            <div class="flex"><span class="w-24 font-semibold text-stone-900">Shop:</span> <span>{{ optional($product->shop)->shop_name ?? 'Default Shop' }}</span></div>
                            <div class="flex"><span class="w-24 font-semibold text-stone-900">Brand:</span> <span>{{ optional($product->brand)->brand_name ?? 'Default Brand' }}</span></div>
                            <div class="flex"><span class="w-24 font-semibold text-stone-900">Category:</span>
                                <span class="text-stone-500">
                                    @forelse($product->category as $category)
                                    {{ optional($category->categoryName)->category_name }}{{ !$loop->last ? ', ' : '' }}
                                    @empty
                                    Uncategorized
                                    @endforelse
                                </span>
                            </div>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
</section>

@endsection
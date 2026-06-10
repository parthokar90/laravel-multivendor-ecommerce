@extends('front.layout.master')

@section('title') Home @endsection

@section('content')

<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-10">
            <h3 class="text-3xl font-bold text-gray-900 tracking-tight">Shop List</h3>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($shop->take(8) as $shops)
            <div class="h-full">
                <a href="{{ route('shop.single', ['id'=>$shops->id,'slug'=>$shops->shop_slug]) }}" class="group block h-full">
                    <div class="bg-white rounded-2xl border-0 overflow-hidden shadow-[0_10px_30px_rgba(0,0,0,0.08)] group-hover:shadow-[0_20px_50px_rgba(0,0,0,0.15)] group-hover:-translate-y-2 transition-all duration-350 ease-in-out text-center h-full flex flex-col">
                        
                        <div class="overflow-hidden h-52 sm:h-56 w-full">
                            <img src="https://placehold.co/300x200?text={{ $shops->shop_name }}" 
                                 class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-500" 
                                 alt="{{ $shops->shop_name }}">
                        </div>

                        <div class="p-6 flex-1 flex flex-col justify-center">
                            <h5 class="text-lg md:text-xl font-semibold text-gray-900 leading-snug">
                                {{ $shops->products->count() }} Products
                            </h5>
                        </div>
                    </div>
                </a>
            </div>
            @empty
            <div class="col-span-full text-center py-6">
                <p class="text-gray-500 font-medium">No Shop Found</p>
            </div>
            @endforelse
        </div>
    </div>
</section>


<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-10">
            <h3 class="text-3xl font-bold text-gray-900 tracking-tight">Brands</h3>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($brand as $brands)
            <div class="h-full">
                <a href="{{ route('brand.product', ['id'=>$brands->id,'slug'=>$brands->slug]) }}" class="group block h-full">
                    <div class="bg-white rounded-2xl border-0 overflow-hidden shadow-[0_10px_30px_rgba(0,0,0,0.08)] group-hover:shadow-[0_20px_50px_rgba(0,0,0,0.15)] group-hover:-translate-y-2 transition-all duration-350 ease-in-out text-center h-full flex flex-col">
                        
                        <div class="overflow-hidden h-52 sm:h-56 w-full">
                            <img src="https://placehold.co/300x200?text={{ $brands->brand_name }}" 
                                 class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-500" 
                                 alt="{{ $brands->brand_name }}">
                        </div>

                        <div class="p-6 flex-1 flex flex-col justify-center">
                            <h5 class="text-lg md:text-xl font-semibold text-gray-900 leading-snug">
                                {{ $brands->products->count() }} Products
                            </h5>
                        </div>
                    </div>
                </a>
            </div>
            @empty
            <div class="col-span-full text-center py-6">
                <p class="text-gray-500 font-medium">No Brand Found</p>
            </div>
            @endforelse
        </div>
    </div>
</section>


<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-10">
            <h3 class="text-3xl font-bold text-gray-900 tracking-tight">From The Blog</h3>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            <div class="group bg-white rounded-2xl overflow-hidden shadow-[0_10px_30px_rgba(0,0,0,0.08)] group-hover:shadow-[0_20px_50px_rgba(0,0,0,0.15)] hover:-translate-y-2 transition-all duration-350 ease-in-out h-full flex flex-col">
                <div class="overflow-hidden h-48 sm:h-52 w-full">
                    <img src="https://placehold.co/600x400" class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-500" alt="Blog">
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <p class="text-gray-400 text-xs mb-2.5">May 09, 2026</p>
                        <h5 class="text-lg font-semibold text-gray-900 leading-snug mb-3 group-hover:text-amber-600 transition duration-300">
                            Top Fashion Trends You Should Follow This Season
                        </h5>
                        <p class="text-gray-500 text-sm leading-relaxed mb-4">
                            Discover the latest fashion trends and styling ideas to upgrade your wardrobe effortlessly.
                        </p>
                    </div>
                    <div>
                        <a href="#" class="inline-block bg-neutral-900 text-white text-xs font-semibold px-6 py-2.5 rounded-full hover:bg-amber-600 transition duration-300 uppercase tracking-wider">
                            Read More
                        </a>
                    </div>
                </div>
            </div>

            <div class="group bg-white rounded-2xl overflow-hidden shadow-[0_10px_30px_rgba(0,0,0,0.08)] group-hover:shadow-[0_20px_50px_rgba(0,0,0,0.15)] hover:-translate-y-2 transition-all duration-350 ease-in-out h-full flex flex-col">
                <div class="overflow-hidden h-48 sm:h-52 w-full">
                    <img src="https://placehold.co/600x400" class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-500" alt="Blog">
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <p class="text-gray-400 text-xs mb-2.5">May 05, 2026</p>
                        <h5 class="text-lg font-semibold text-gray-900 leading-snug mb-3 group-hover:text-amber-600 transition duration-300">
                            How To Choose The Perfect Accessories
                        </h5>
                        <p class="text-gray-500 text-sm leading-relaxed mb-4">
                            Learn how to match accessories with your outfit and create a complete modern look.
                        </p>
                    </div>
                    <div>
                        <a href="#" class="inline-block bg-neutral-900 text-white text-xs font-semibold px-6 py-2.5 rounded-full hover:bg-amber-600 transition duration-300 uppercase tracking-wider">
                            Read More
                        </a>
                    </div>
                </div>
            </div>

            <div class="group bg-white rounded-2xl overflow-hidden shadow-[0_10px_30px_rgba(0,0,0,0.08)] group-hover:shadow-[0_20px_50px_rgba(0,0,0,0.15)] hover:-translate-y-2 transition-all duration-350 ease-in-out h-full flex flex-col">
                <div class="overflow-hidden h-48 sm:h-52 w-full">
                    <img src="https://placehold.co/600x400" class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-500" alt="Blog">
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <p class="text-gray-400 text-xs mb-2.5">April 28, 2026</p>
                        <h5 class="text-lg font-semibold text-gray-900 leading-snug mb-3 group-hover:text-amber-600 transition duration-300">
                            Everyday Essentials For A Minimal Lifestyle
                        </h5>
                        <p class="text-gray-500 text-sm leading-relaxed mb-4">
                            Explore must-have daily essentials that combine simplicity, comfort, and style.
                        </p>
                    </div>
                    <div>
                        <a href="#" class="inline-block bg-neutral-900 text-white text-xs font-semibold px-6 py-2.5 rounded-full hover:bg-amber-600 transition duration-300 uppercase tracking-wider">
                            Read More
                        </a>
                    </div>
                </div>
            </div>

            <div class="group bg-white rounded-2xl overflow-hidden shadow-[0_10px_30px_rgba(0,0,0,0.08)] group-hover:shadow-[0_20px_50px_rgba(0,0,0,0.15)] hover:-translate-y-2 transition-all duration-350 ease-in-out h-full flex flex-col">
                <div class="overflow-hidden h-48 sm:h-52 w-full">
                    <img src="https://placehold.co/600x400" class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-500" alt="Blog">
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <p class="text-gray-400 text-xs mb-2.5">April 20, 2026</p>
                        <h5 class="text-lg font-semibold text-gray-900 leading-snug mb-3 group-hover:text-amber-600 transition duration-300">
                            Smart Shopping Tips To Save More Money
                        </h5>
                        <p class="text-gray-500 text-sm leading-relaxed mb-4">
                            Follow these practical shopping tips to get the best deals without compromising quality.
                        </p>
                    </div>
                    <div>
                        <a href="#" class="inline-block bg-neutral-900 text-white text-xs font-semibold px-6 py-2.5 rounded-full hover:bg-amber-600 transition duration-300 uppercase tracking-wider">
                            Read More
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
@extends('front.layout.master')

@section('title') Home @endsection

@section('content')


<section id="hero-slider" class="relative bg-stone-950 overflow-hidden">

    <div class="slide-item active-slide relative min-h-[500px] md:min-h-[600px] flex items-center bg-cover bg-center transition-all duration-1000 opacity-100 block" style="background-image: url('https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=1600&q=80');">
        <div class="absolute inset-0 bg-stone-950/60"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full text-center md:text-left text-white py-20">
            <div class="max-w-2xl space-y-6">
                <span class="inline-block text-xs font-bold uppercase tracking-widest text-amber-500 bg-amber-500/10 px-3 py-1 rounded-full">Exclusive Collection 2026</span>
                <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight leading-tight">Upgrade Your Style, <br class="hidden md:block">Elevate Your Life.</h1>
                <p class="text-base sm:text-lg text-stone-300 max-w-md">Explore high-quality products from top verified global brands with secure payment modes.</p>
                <div class="pt-4 flex flex-col sm:flex-row items-center justify-center md:justify-start gap-4">
                    <a href="#" class="w-full sm:w-auto text-center bg-amber-500 hover:bg-amber-600 text-stone-950 font-bold uppercase tracking-wider text-xs px-8 py-4 rounded-xl transition duration-300 shadow-lg">Shop Now</a>
                </div>
            </div>
        </div>
    </div>

    <div class="slide-item relative min-h-[500px] md:min-h-[600px] flex items-center bg-cover bg-center transition-all duration-1000 opacity-0 hidden" style="background-image: url('https://images.unsplash.com/photo-1472851294608-062f824d29cc?auto=format&fit=crop&w=1600&q=80');">
        <div class="absolute inset-0 bg-stone-950/60"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full text-center md:text-left text-white py-20">
            <div class="max-w-2xl space-y-6">
                <span class="inline-block text-xs font-bold uppercase tracking-widest text-amber-500 bg-amber-500/10 px-3 py-1 rounded-full">New Arrivals</span>
                <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight leading-tight">Discover The <br class="hidden md:block">Latest Tech & Gadgets.</h1>
                <p class="text-base sm:text-lg text-stone-300 max-w-md">Get your hands on tomorrow's technology today with official brand warranties.</p>
                <div class="pt-4 flex flex-col sm:flex-row items-center justify-center md:justify-start gap-4">
                    <a href="#" class="w-full sm:w-auto text-center bg-amber-500 hover:bg-amber-600 text-stone-950 font-bold uppercase tracking-wider text-xs px-8 py-4 rounded-xl transition duration-300 shadow-lg">Explore Tech</a>
                </div>
            </div>
        </div>
    </div>

    <div class="slide-item relative min-h-[500px] md:min-h-[600px] flex items-center bg-cover bg-center transition-all duration-1000 opacity-0 hidden" style="background-image: url('https://images.unsplash.com/photo-1441984904996-e0b6ba687e04?auto=format&fit=crop&w=1600&q=80');">
        <div class="absolute inset-0 bg-stone-950/60"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full text-center md:text-left text-white py-20">
            <div class="max-w-2xl space-y-6">
                <span class="inline-block text-xs font-bold uppercase tracking-widest text-amber-500 bg-amber-500/10 px-3 py-1 rounded-full">Big Summer Sale</span>
                <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight leading-tight">Up To 50% OFF <br class="hidden md:block">On Fashion Brands.</h1>
                <p class="text-base sm:text-lg text-stone-300 max-w-md">Limited time offer. Refresh your wardrobe with premium quality apparel at half price.</p>
                <div class="pt-4 flex flex-col sm:flex-row items-center justify-center md:justify-start gap-4">
                    <a href="#" class="w-full sm:w-auto text-center bg-amber-500 hover:bg-amber-600 text-stone-950 font-bold uppercase tracking-wider text-xs px-8 py-4 rounded-xl transition duration-300 shadow-lg">View Offers</a>
                </div>
            </div>
        </div>
    </div>

    <div class="absolute bottom-6 left-0 right-0 flex justify-center space-x-3 z-20">
        <button onclick="goToSlide(0)" class="slider-dot w-3 h-3 rounded-full bg-white transition-all duration-300" aria-label="Slide 1"></button>
        <button onclick="goToSlide(1)" class="slider-dot w-3 h-3 rounded-full bg-white/40 transition-all duration-300" aria-label="Slide 2"></button>
        <button onclick="goToSlide(2)" class="slider-dot w-3 h-3 rounded-full bg-white/40 transition-all duration-300" aria-label="Slide 3"></button>
    </div>
</section>

<section class="py-16 bg-stone-50 border-t border-stone-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h3 class="text-3xl font-extrabold text-stone-900 tracking-tight">Shop List</h3>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($shop->take(8) as $shops)
            <div class="h-full">
                <a href="{{ route('shop.single', ['id'=>$shops->id,'slug'=>$shops->shop_slug]) }}" class="group block h-full">
                    <div class="bg-white rounded-2xl border border-stone-200 overflow-hidden shadow-sm hover:shadow-md hover:-translate-y-1.5 transition-all duration-300 text-center h-full flex flex-col">

                        <div class="h-52 sm:h-56 w-full bg-gradient-to-br from-stone-800 to-stone-950 flex flex-col items-center justify-center p-6 relative overflow-hidden group-hover:from-amber-600 group-hover:to-amber-700 transition-all duration-500">

                            <div class="absolute inset-0 opacity-10 bg-[linear-gradient(to_right,#808080_1px,transparent_1px),linear-gradient(to_bottom,#808080_1px,transparent_1px)] bg-[size:14px_24px]"></div>

                            <div class="w-16 h-16 rounded-2xl bg-white/10 backdrop-blur-md flex items-center justify-center text-white text-3xl font-black uppercase tracking-wider mb-3 shadow-inner group-hover:bg-stone-950/20 group-hover:scale-110 transition duration-500">
                                {{ substr($shops->shop_name, 0, 1) }}
                            </div>

                            <span class="text-white text-sm font-bold tracking-wide uppercase line-clamp-1 max-w-[85%] relative z-10">
                                {{ $shops->shop_name }}
                            </span>
                        </div>

                        <div class="p-6 flex-1 flex flex-col justify-between bg-white space-y-3">
                            <div class="space-y-1">
                                <h4 class="text-base font-bold text-stone-900 truncate">
                                    {{ $shops->shop_name }}
                                </h4>
                                <p class="text-xs font-semibold text-stone-500 uppercase tracking-wider">
                                    {{ $shops->products->count() }} Products
                                </p>
                            </div>

                            <div class="pt-1">
                                <span class="w-full inline-flex items-center justify-center border border-stone-200 group-hover:border-stone-900 group-hover:bg-stone-900 group-hover:text-white text-stone-700 text-xs font-bold uppercase tracking-wider py-2.5 rounded-xl transition duration-300">
                                    Enter Shop
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @empty
            <div class="col-span-full text-center bg-white border border-stone-200 rounded-2xl py-12">
                <p class="text-stone-400 font-medium">No Shop Found</p>
            </div>
            @endforelse
        </div>
    </div>
</section>


<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-xl mx-auto mb-12 space-y-2">
            <h3 class="text-3xl font-extrabold text-stone-900 tracking-tight">Trending Products</h3>
            <p class="text-sm text-stone-500">Have a look at what everyone else is buying right now.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @for ($i = 1; $i <= 4; $i++)
                <div class="group bg-white rounded-xl border border-stone-200 overflow-hidden shadow-sm hover:shadow-md transition duration-300 flex flex-col justify-between">
                <div class="relative bg-stone-50 overflow-hidden aspect-square flex items-center justify-center p-4">
                    <span class="absolute top-3 left-3 bg-rose-500 text-white text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded-full z-10">Trending</span>
                    <a href="#" class="w-full h-full block">
                        <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=500&q=80"
                            class="w-full h-full object-cover rounded-lg group-hover:scale-105 transition duration-500"
                            alt="Trending Product">
                    </a>
                </div>

                <div class="p-5 flex-1 flex flex-col justify-between space-y-3">
                    <div class="space-y-1.5 text-center">
                        <a href="#" class="block">
                            <h5 class="text-sm font-semibold text-stone-900 group-hover:text-amber-600 transition line-clamp-2 h-10 leading-tight">
                                Wireless Ultra Premium Noise Cancelling Headphones
                            </h5>
                        </a>
                        <p class="text-base font-bold text-stone-900">৳ ১৫,৫০০</p>
                    </div>
                    <div class="pt-2">
                        <a href="#" class="w-full inline-flex items-center justify-center bg-stone-900 hover:bg-amber-600 text-white text-xs font-bold uppercase tracking-wider py-2.5 px-4 rounded-lg shadow-sm transition duration-300">
                            View Details
                        </a>
                    </div>
                </div>
        </div>
        @endfor
    </div>
    </div>
</section>

<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-xl mx-auto mb-8 space-y-1">
            <h3 class="text-2xl font-extrabold text-stone-900 tracking-tight">Trending Categories</h3>
            <p class="text-xs text-stone-500">Discover handpicked premium assortments curated based on this season's popular waves.</p>
        </div>

        <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-6 gap-4">
            @forelse ($allCategory->take(12) as $categorys) {{-- ছোট করায় এখন ৮টার বদলে ১২টাও সুন্দর দেখাবে --}}
            <div class="h-full">
                <a href="{{ route('category.product', ['id' => $categorys->id, 'slug' => $categorys->slug ?? Str::slug($categorys->category_name)]) }}" class="group relative rounded-xl overflow-hidden aspect-square bg-gradient-to-br from-stone-900 to-stone-950 flex flex-col items-center justify-between p-4 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 ease-in-out">

                    <div class="absolute inset-0 opacity-5 bg-[linear-gradient(to_right,#808080_1px,transparent_1px),linear-gradient(to_bottom,#808080_1px,transparent_1px)] bg-[size:12px_20px]"></div>

                    <div class="my-auto w-12 h-12 rounded-xl bg-white/10 backdrop-blur-md flex items-center justify-center text-white text-xl font-black uppercase tracking-wider shadow-inner group-hover:bg-amber-500 group-hover:text-stone-950 group-hover:scale-105 transition duration-300 border border-white/10">
                        {{ substr($categorys->category_name, 0, 1) }}
                    </div>

                    <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-stone-950 via-stone-950/50 to-transparent p-3 pt-8 text-center z-10">
                        <h5 class="text-white font-semibold text-xs md:text-sm tracking-wide group-hover:text-amber-400 transition duration-300 truncate px-1">
                            {{ $categorys->category_name }}
                        </h5>
                    </div>
                </a>
            </div>
            @empty
            <div class="col-span-full text-center bg-stone-50 border border-stone-200 rounded-xl py-8">
                <p class="text-stone-400 text-xs font-medium">No Category Found</p>
            </div>
            @endforelse
        </div>
    </div>
</section>


<section class="py-16 bg-stone-50 border-t border-stone-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h3 class="text-3xl font-extrabold text-stone-900 tracking-tight">Brands</h3>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($brand as $brands)
            <div class="h-full">
                <a href="{{ route('brand.product', ['id'=>$brands->id,'slug'=>$brands->slug]) }}" class="group block h-full">
                    <div class="bg-white rounded-2xl border border-stone-200 overflow-hidden shadow-sm hover:shadow-md hover:-translate-y-1.5 transition-all duration-300 text-center h-full flex flex-col">

                        <div class="h-52 sm:h-56 w-full bg-gradient-to-br from-stone-900 to-stone-950 flex flex-col items-center justify-center p-6 relative overflow-hidden group-hover:from-amber-600 group-hover:to-amber-700 transition-all duration-500">

                            <div class="absolute inset-0 opacity-10 bg-[linear-gradient(to_right,#808080_1px,transparent_1px),linear-gradient(to_bottom,#808080_1px,transparent_1px)] bg-[size:14px_24px]"></div>

                            <div class="w-16 h-16 rounded-full bg-white/10 backdrop-blur-md flex items-center justify-center text-white text-3xl font-black uppercase tracking-wider mb-3 shadow-inner group-hover:bg-stone-950/20 group-hover:scale-110 transition duration-500 border border-white/10">
                                {{ substr($brands->brand_name, 0, 1) }}
                            </div>

                            <span class="text-white text-xs font-bold tracking-widest uppercase line-clamp-1 max-w-[85%] relative z-10 opacity-90 group-hover:opacity-100">
                                {{ $brands->brand_name }}
                            </span>
                        </div>

                        <div class="p-6 flex-1 flex flex-col justify-between bg-white space-y-3">
                            <div class="space-y-1">
                                <h4 class="text-base font-bold text-stone-900 group-hover:text-amber-600 transition truncate">
                                    {{ $brands->brand_name }}
                                </h4>
                                <p class="text-xs font-semibold text-stone-500 uppercase tracking-wider">
                                    {{ $brands->products->count() }} Products
                                </p>
                            </div>

                            <div class="pt-1">
                                <span class="w-full inline-flex items-center justify-center border border-stone-200 group-hover:border-stone-900 group-hover:bg-stone-900 group-hover:text-white text-stone-700 text-xs font-bold uppercase tracking-wider py-2.5 rounded-xl transition duration-300">
                                    View Brand
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @empty
            <div class="col-span-full text-center bg-white border border-stone-200 rounded-2xl py-12">
                <p class="text-stone-400 font-medium">No Brand Found</p>
            </div>
            @endforelse
        </div>
    </div>
</section>


<section class="py-16 bg-white border-t border-stone-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h3 class="text-3xl font-extrabold text-stone-900 tracking-tight">From The Blog</h3>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            <div class="group bg-white rounded-2xl overflow-hidden border border-stone-200 shadow-sm hover:shadow-md hover:-translate-y-1.5 transition-all duration-300 h-full flex flex-col">
                <div class="overflow-hidden h-48 sm:h-52 w-full bg-stone-100">
                    <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?auto=format&fit=crop&w=600&q=80" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="Blog">
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <p class="text-stone-400 text-xs mb-2.5">May 09, 2026</p>
                        <h5 class="text-sm font-bold text-stone-900 leading-snug mb-3 group-hover:text-amber-600 transition duration-300 line-clamp-2">
                            Top Fashion Trends You Should Follow This Season
                        </h5>
                        <p class="text-stone-500 text-xs leading-relaxed mb-4 line-clamp-3">
                            Discover the latest fashion trends and styling ideas to upgrade your wardrobe effortlessly.
                        </p>
                    </div>
                    <div>
                        <a href="#" class="inline-block bg-stone-900 text-white text-[10px] font-bold px-5 py-2.5 rounded-xl hover:bg-amber-600 transition duration-300 uppercase tracking-wider">
                            Read More
                        </a>
                    </div>
                </div>
            </div>

            <div class="group bg-white rounded-2xl overflow-hidden border border-stone-200 shadow-sm hover:shadow-md hover:-translate-y-1.5 transition-all duration-300 h-full flex flex-col">
                <div class="overflow-hidden h-48 sm:h-52 w-full bg-stone-100">
                    <img src="https://images.unsplash.com/photo-1509631179647-0177331693ae?auto=format&fit=crop&w=600&q=80" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="Blog">
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <p class="text-stone-400 text-xs mb-2.5">May 05, 2026</p>
                        <h5 class="text-sm font-bold text-stone-900 leading-snug mb-3 group-hover:text-amber-600 transition duration-300 line-clamp-2">
                            How To Choose The Perfect Accessories
                        </h5>
                        <p class="text-stone-500 text-xs leading-relaxed mb-4 line-clamp-3">
                            Learn how to match accessories with your outfit and create a complete modern look.
                        </p>
                    </div>
                    <div>
                        <a href="#" class="inline-block bg-stone-900 text-white text-[10px] font-bold px-5 py-2.5 rounded-xl hover:bg-amber-600 transition duration-300 uppercase tracking-wider">
                            Read More
                        </a>
                    </div>
                </div>
            </div>

            <div class="group bg-white rounded-2xl overflow-hidden border border-stone-200 shadow-sm hover:shadow-md hover:-translate-y-1.5 transition-all duration-300 h-full flex flex-col">
                <div class="overflow-hidden h-48 sm:h-52 w-full bg-stone-100">
                    <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=600&q=80" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="Blog">
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <p class="text-stone-400 text-xs mb-2.5">April 28, 2026</p>
                        <h5 class="text-sm font-bold text-stone-900 leading-snug mb-3 group-hover:text-amber-600 transition duration-300 line-clamp-2">
                            Everyday Essentials For A Minimal Lifestyle
                        </h5>
                        <p class="text-stone-500 text-xs leading-relaxed mb-4 line-clamp-3">
                            Explore must-have daily essentials that combine simplicity, comfort, and style.
                        </p>
                    </div>
                    <div>
                        <a href="#" class="inline-block bg-stone-900 text-white text-[10px] font-bold px-5 py-2.5 rounded-xl hover:bg-amber-600 transition duration-300 uppercase tracking-wider">
                            Read More
                        </a>
                    </div>
                </div>
            </div>

            <div class="group bg-white rounded-2xl overflow-hidden border border-stone-200 shadow-sm hover:shadow-md hover:-translate-y-1.5 transition-all duration-300 h-full flex flex-col">
                <div class="overflow-hidden h-48 sm:h-52 w-full bg-stone-100">
                    <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e?auto=format&fit=crop&w=600&q=80" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="Blog">
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <p class="text-stone-400 text-xs mb-2.5">April 20, 2026</p>
                        <h5 class="text-sm font-bold text-stone-900 leading-snug mb-3 group-hover:text-amber-600 transition duration-300 line-clamp-2">
                            Smart Shopping Tips To Save More Money
                        </h5>
                        <p class="text-stone-500 text-xs leading-relaxed mb-4 line-clamp-3">
                            Follow these practical shopping tips to get the best deals without compromising quality.
                        </p>
                    </div>
                    <div>
                        <a href="#" class="inline-block bg-stone-900 text-white text-[10px] font-bold px-5 py-2.5 rounded-xl hover:bg-amber-600 transition duration-300 uppercase tracking-wider">
                            Read More
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slide-item');
    const dots = document.querySelectorAll('.slider-dot');
    const totalSlides = slides.length;
    let slideInterval;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.remove('opacity-100', 'block');
            slide.classList.add('opacity-0', 'hidden');

            dots[i].classList.remove('bg-white', 'w-6');
            dots[i].classList.add('bg-white/40');
        });

        slides[index].classList.remove('opacity-0', 'hidden');
        slides[index].classList.add('opacity-100', 'block');

        dots[index].classList.remove('bg-white/40');
        dots[index].classList.add('bg-white', 'w-6');

        currentSlide = index;
    }

    function nextSlide() {
        let next = (currentSlide + 1) % totalSlides;
        showSlide(next);
    }

    function goToSlide(index) {
        showSlide(index);
        resetTimer();
    }

    function startTimer() {
        slideInterval = setInterval(nextSlide, 5000);
    }

    function resetTimer() {
        clearInterval(slideInterval);
        startTimer();
    }

    document.addEventListener('DOMContentLoaded', () => {
        showSlide(0);
        startTimer();
    });
</script>

@endsection
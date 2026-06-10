@extends('front.layout.master')

@section('title') Contact @endsection

@section('content')

<section class="relative bg-cover bg-center py-20 text-white" style="background-image: url('{{ asset('front/assets/images/banner.jpg') }}');">
    <div class="absolute inset-0 bg-black/50"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold tracking-tight mb-3 capitalize">Contact Us</h2>
        <nav aria-label="breadcrumb">
            <ol class="inline-flex items-center justify-center space-x-2 text-sm font-medium">
                <li class="inline-flex items-center">
                    <a href="{{ route('home.page') }}" class="text-stone-300 hover:text-white transition">Home</a>
                </li>
                <li class="text-stone-400">/</li>
                <li class="text-amber-500 font-semibold" aria-current="page">Contact</li>
            </ol>
        </nav>
    </div>
</section>

<section class="py-16 bg-stone-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <div class="bg-white rounded-2xl border border-stone-200 p-8 text-center shadow-sm hover:shadow-md transition duration-300 flex flex-col items-center space-y-4">
                <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg>
                </div>
                <h4 class="text-lg font-bold text-stone-900">Our Office</h4>
                <p class="text-sm text-stone-600 leading-relaxed">
                    8273 NW 56th ST Miami, Florida, <br>33195 United States
                </p>
            </div>

            <div class="bg-white rounded-2xl border border-stone-200 p-8 text-center shadow-sm hover:shadow-md transition duration-300 flex flex-col items-center space-y-4">
                <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-1.514 2.018a14.977 14.977 0 0 1-6.538-6.538l2.018-1.514c.361-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                    </svg>
                </div>
                <h4 class="text-lg font-bold text-stone-900">Call Us</h4>
                <p class="text-sm text-stone-600 leading-relaxed">
                    +8 123 456 +98709928 <br>
                    <span class="text-amber-600 font-medium">24/7 Hours Support</span>
                </p>
            </div>

            <div class="bg-white rounded-2xl border border-stone-200 p-8 text-center shadow-sm hover:shadow-md transition duration-300 flex flex-col items-center space-y-4">
                <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0l-7.5-4.615a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                    </svg>
                </div>
                <h4 class="text-lg font-bold text-stone-900">Email Address</h4>
                <p class="text-sm text-stone-600 leading-relaxed">
                    demo@example.com <br>
                    demo2@example.com
                </p>
            </div>

        </div>
    </div>
</section>

<section class="py-16 bg-white border-t border-stone-200">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">

        <div class="bg-stone-50 rounded-2xl border border-stone-200 p-8 sm:p-10 space-y-8 shadow-sm">
            <div class="text-center space-y-2">
                <h2 class="text-2xl md:text-3xl font-bold tracking-tight text-stone-900">Leave a Message</h2>
                <p class="text-sm text-stone-500 max-w-md mx-auto">Have questions or feedback? Drop us a line and we will get back to you shortly.</p>
            </div>

            <form action="#" method="POST" class="space-y-5">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div class="space-y-1.5">
                        <label class="text-xs font-semibold uppercase tracking-wider text-stone-600">Full Name</label>
                        <input type="text" placeholder="Your name" class="w-full bg-white border border-stone-200 focus:ring-amber-500/20 focus:border-amber-500 rounded-xl px-4 py-3 text-sm transition outline-none focus:ring-4">
                    </div>

                    <div class="space-y-1.5">
                        <label class="text-xs font-semibold uppercase tracking-wider text-stone-600">Email Address</label>
                        <input type="email" placeholder="Your email address" class="w-full bg-white border border-stone-200 focus:ring-amber-500/20 focus:border-amber-500 rounded-xl px-4 py-3 text-sm transition outline-none focus:ring-4">
                    </div>

                    <div class="space-y-1.5">
                        <label class="text-xs font-semibold uppercase tracking-wider text-stone-600">Website (Optional)</label>
                        <input type="text" placeholder="https://example.com" class="w-full bg-white border border-stone-200 focus:ring-amber-500/20 focus:border-amber-500 rounded-xl px-4 py-3 text-sm transition outline-none focus:ring-4">
                    </div>

                    <div class="space-y-1.5">
                        <label class="text-xs font-semibold uppercase tracking-wider text-stone-600">Phone Number</label>
                        <input type="tel" placeholder="Your phone number" class="w-full bg-white border border-stone-200 focus:ring-amber-500/20 focus:border-amber-500 rounded-xl px-4 py-3 text-sm transition outline-none focus:ring-4">
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label class="text-xs font-semibold uppercase tracking-wider text-stone-600">Your Message</label>
                    <textarea rows="5" placeholder="Write your comments here..." class="w-full bg-white border border-stone-200 focus:ring-amber-500/20 focus:border-amber-500 rounded-xl px-4 py-3 text-sm transition outline-none focus:ring-4 resize-none"></textarea>
                </div>

                <div class="text-center pt-2">
                    <button type="submit" class="inline-flex items-center justify-center bg-stone-900 hover:bg-amber-600 text-white font-bold uppercase tracking-wider py-3 px-8 rounded-xl shadow-sm hover:shadow transition duration-300 min-w-[200px]">
                        Send Message
                    </button>
                </div>
            </form>
        </div>

    </div>
</section>

<section class="relative w-full h-[450px] bg-stone-200 overflow-hidden">
    <div class="google-map-wrapper hidden" data-latitude='40.7656561' data-longitude='-73.7691858' data-zoom='11' data-marker='assets/images/map-pin.png'></div>

    <div id="map" class="w-full h-full"></div>
</section>

@endsection
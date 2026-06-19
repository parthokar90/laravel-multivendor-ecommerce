@extends('front.layout.master')

@section('title') Page Not Found @endsection

@section('content')

<section class="relative min-h-screen bg-stone-50 flex items-center justify-center py-16 px-4 overflow-hidden">
    <div class="absolute inset-0 z-0 bg-cover bg-center opacity-10 mix-blend-overlay" style="background-image: url('{{ asset('front/assets/images/404.jpg') }}');"></div>

    <div class="relative z-10 max-w-xl w-full text-center space-y-8">

        <div class="relative flex flex-col items-center justify-center">
            <div class="absolute w-64 h-64 bg-amber-500/10 rounded-full blur-3xl -z-10 animate-pulse"></div>

            <h1 class="text-9xl font-black tracking-widest text-stone-900 select-none">404</h1>

            <div class="absolute bottom-0 bg-stone-900 text-white p-2 rounded-xl shadow-lg border border-stone-800 transform translate-y-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 text-amber-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg>
            </div>
        </div>

        <div class="space-y-3 pt-4">
            <p class="text-xs font-bold uppercase tracking-widest text-amber-600">Oops! It looks like you are lost</p>
            <h2 class="text-2xl md:text-3xl font-black text-stone-900 tracking-tight">Your cart is currently empty</h2>
            <p class="text-sm text-stone-500 max-w-sm mx-auto leading-relaxed">
                The page you are looking for doesn't exist or your shopping bag feels a bit light. Let's get you back on track!
            </p>
        </div>

        <div class="pt-4">
            <a href="{{ route('home.page') }}" class="inline-flex items-center space-x-2 bg-stone-900 hover:bg-stone-800 text-white text-xs font-bold uppercase tracking-wider py-3.5 px-6 rounded-xl shadow-sm hover:shadow transition duration-300">
                <span>Return Home Page</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7m7.5-7H3" />
                </svg>
            </a>
        </div>

    </div>
</section>

@endsection
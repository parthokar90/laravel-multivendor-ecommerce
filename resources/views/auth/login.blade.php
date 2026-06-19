@extends('front.layout.master')

@section('title') Customer Login @endsection

@section('content')

<section class="relative bg-cover bg-center py-20 text-white" style="background-image: url('{{ asset('front/assets/images/banner.jpg') }}');">
    <div class="absolute inset-0 bg-black/50"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold tracking-tight mb-3 capitalize">Login</h2>
        <nav aria-label="breadcrumb">
            <ol class="inline-flex items-center justify-center space-x-2 text-sm font-medium">
                <li class="inline-flex items-center">
                    <a href="{{ route('home.page') }}" class="text-stone-300 hover:text-white transition">Home</a>
                </li>
                <li class="text-stone-400">/</li>
                <li class="text-amber-500 font-semibold" aria-current="page">Login</li>
            </ol>
        </nav>
    </div>
</section>

<section class="py-16 bg-stone-50 min-h-screen flex items-center">
    <div class="max-w-md w-full mx-auto px-4 sm:px-6">

        <div class="bg-white rounded-2xl border border-stone-200 shadow-sm p-8 space-y-6">

            <div class="text-center space-y-1">
                <h4 class="text-2xl font-bold tracking-tight text-stone-900">Welcome Back</h4>
                <p class="text-sm text-stone-500">Login if you are a returning customer.</p>
            </div>

            <div class="bg-stone-50 border border-stone-200 rounded-xl p-4 text-sm text-stone-600 space-y-2">
                <div class="flex justify-between">
                    <span class="font-medium text-stone-900">Demo Email:</span>
                    <span class="font-mono bg-white px-1.5 py-0.5 rounded border border-stone-200 select-all">customer@email.com</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-medium text-stone-900">Demo Password:</span>
                    <span class="font-mono bg-white px-1.5 py-0.5 rounded border border-stone-200 select-all">12345678</span>
                </div>
                <div class="pt-1">
                    <button type="button" onclick="fillDemoCredentials()" class="w-full bg-stone-200 hover:bg-stone-300 text-stone-800 text-xs font-bold uppercase tracking-wider py-1.5 px-3 rounded-lg transition">
                        Use Demo Credentials
                    </button>
                </div>
            </div>

            @if(Session::has('message'))
            <div class="bg-rose-50 border border-rose-200 text-rose-600 text-sm px-4 py-3 rounded-xl flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 flex-shrink-0">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                </svg>
                <span>{{ Session::get('message') }}</span>
            </div>
            @endif

            {{-- Social Login Section --}}
            <div class="grid grid-cols-2 gap-3">
                <a href="#" class="inline-flex items-center justify-center space-x-2 bg-white border border-stone-200 hover:bg-stone-50 text-stone-700 text-xs font-bold uppercase tracking-wider py-3 px-4 rounded-xl transition shadow-2xs">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                        <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                        <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l3.66-2.85z" fill="#FBBC05"/>
                        <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.85c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                    </svg>
                    <span>Google</span>
                </a>

                <a href="#" class="inline-flex items-center justify-center space-x-2 bg-[#1877F2] hover:bg-[#166FE5] text-white text-xs font-bold uppercase tracking-wider py-3 px-4 rounded-xl transition shadow-2xs">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                    </svg>
                    <span>Facebook</span>
                </a>
            </div>

            {{-- Divider --}}
            <div class="relative flex py-2 items-center">
                <div class="flex-grow border-t border-stone-200"></div>
                <span class="flex-shrink mx-4 text-stone-400 text-xs font-semibold uppercase tracking-wider">Or</span>
                <div class="flex-grow border-t border-stone-200"></div>
            </div>

            <form action="{{ route('customer.login.process') }}" method="post" class="space-y-4">
                @csrf

                <div class="space-y-1.5">
                    <label class="text-xs font-semibold uppercase tracking-wider text-stone-600">Email Address</label>
                    <input type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="e.g., alex@example.com"
                        class="w-full bg-white border @error('email') border-rose-500 focus:ring-rose-500/20 focus:border-rose-500 @else border-stone-200 focus:ring-amber-500/20 focus:border-amber-500 @enderror rounded-xl px-4 py-3 text-sm transition outline-none focus:ring-4">
                    @error('email')
                    <p class="text-xs font-medium text-rose-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-1.5">
                    <label class="text-xs font-semibold uppercase tracking-wider text-stone-600">Password</label>
                    <input type="password"
                        id="password"
                        name="password"
                        placeholder="••••••••"
                        class="w-full bg-white border @error('password') border-rose-500 focus:ring-rose-500/20 focus:border-rose-500 @else border-stone-200 focus:ring-amber-500/20 focus:border-amber-500 @enderror rounded-xl px-4 py-3 text-sm transition outline-none focus:ring-4">
                    @error('password')
                    <p class="text-xs font-medium text-rose-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center space-x-2 cursor-pointer select-none text-stone-600">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded border-stone-300 text-amber-600 focus:ring-amber-500 focus:ring-offset-0 cursor-pointer">
                        <span>Remember me</span>
                    </label>
                    <a href="#" class="font-medium text-stone-600 hover:text-amber-600 transition">Forgot password?</a>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full bg-stone-900 hover:bg-amber-600 text-white font-bold uppercase tracking-wider py-3 px-4 rounded-xl shadow-sm hover:shadow transition duration-300">
                        Login
                    </button>
                </div>
            </form>

            <div class="border-t border-stone-100 pt-4 text-center">
                <p class="text-sm text-stone-600">
                    Don't have an account?
                    <a href="{{ route('customer.registration') }}" class="font-bold text-stone-900 hover:text-amber-600 transition">Sign up now</a>
                </p>
            </div>

        </div>

    </div>
</section>

<script>
    function fillDemoCredentials() {
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');

        if (emailInput && passwordInput) {
            emailInput.value = 'customer@email.com';
            passwordInput.value = '12345678';
        }
    }
</script>

@endsection
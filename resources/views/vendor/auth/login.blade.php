@extends('front.layout.master')

@section('title') Vendor Login @endsection

@section('content')

<section class="relative bg-cover bg-center py-20 text-white" style="background-image: url('{{ asset('front/assets/images/banner.jpg') }}');">
    <div class="absolute inset-0 bg-black/50"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold tracking-tight mb-3 capitalize">Vendor Login</h2>
        <nav aria-label="breadcrumb">
            <ol class="inline-flex items-center justify-center space-x-2 text-sm font-medium">
                <li class="inline-flex items-center">
                    <a href="{{ route('home.page') }}" class="text-stone-300 hover:text-white transition">Home</a>
                </li>
                <li class="text-stone-400">/</li>
                <li class="text-amber-500 font-semibold" aria-current="page">Vendor Login</li>
            </ol>
        </nav>
    </div>
</section>

<section class="py-16 bg-stone-50 min-h-screen flex items-center">
    <div class="max-w-md w-full mx-auto px-4 sm:px-6">

        <div class="bg-white rounded-2xl border border-stone-200 shadow-sm p-8 space-y-6">

            <div class="text-center space-y-1">
                <h4 class="text-2xl font-bold tracking-tight text-stone-900">Vendor Portal</h4>
                <p class="text-sm text-stone-500">Access your dashboard to manage your shop.</p>
            </div>

            {{-- Demo Credentials Box --}}
            <div class="bg-stone-50 border border-stone-200 rounded-xl p-4 text-sm text-stone-600 space-y-2">
                <div class="flex justify-between">
                    <span class="font-medium text-stone-900">Demo Email:</span>
                    <span class="font-mono bg-white px-1.5 py-0.5 rounded border border-stone-200 select-all">test@vendor.com</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-medium text-stone-900">Demo Password:</span>
                    <span class="font-mono bg-white px-1.5 py-0.5 rounded border border-stone-200 select-all">12345678</span>
                </div>
                <div class="pt-1">
                    <button type="button" onclick="fillVendorDemo()" class="w-full bg-stone-200 hover:bg-stone-300 text-stone-800 text-xs font-bold uppercase tracking-wider py-1.5 px-3 rounded-lg transition">
                        Use Demo Credentials
                    </button>
                </div>
            </div>

            {{-- Error/Flash Message Display --}}
            @if(Session::has('message'))
            <div class="bg-rose-50 border border-rose-200 text-rose-600 text-sm px-4 py-3 rounded-xl flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 flex-shrink-0">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                </svg>
                <span>{{ Session::get('message') }}</span>
            </div>
            @endif

            <form action="{{ route('vendor.login.process') }}" method="post" class="space-y-4">
                @csrf

                <div class="space-y-1.5">
                    <label class="text-xs font-semibold uppercase tracking-wider text-stone-600">Email Address</label>
                    <input type="email"
                        id="vendor_email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="vendor@example.com"
                        class="w-full bg-white border @error('email') border-rose-500 focus:ring-rose-500/20 focus:border-rose-500 @else border-stone-200 focus:ring-amber-500/20 focus:border-amber-500 @enderror rounded-xl px-4 py-3 text-sm transition outline-none focus:ring-4">
                    @error('email')
                    <p class="text-xs font-medium text-rose-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-1.5">
                    <label class="text-xs font-semibold uppercase tracking-wider text-stone-600">Password</label>
                    <input type="password"
                        id="vendor_password"
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
                    <a href="{{ route('vendor.registration') }}" class="font-bold text-stone-900 hover:text-amber-600 transition">Sign up now</a>
                </p>
            </div>

        </div>

    </div>
</section>

<script>
    function fillVendorDemo() {
        const emailInput = document.getElementById('vendor_email');
        const passwordInput = document.getElementById('vendor_password');

        if (emailInput && passwordInput) {
            emailInput.value = 'test@vendor.com';
            passwordInput.value = '12345678';
        }
    }
</script>

@endsection
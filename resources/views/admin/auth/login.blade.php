@extends('admin.layout.auth')

@section('title', 'Admin Login')

@section('content')
<div class="w-full max-w-md">
    <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-white/10">

        {{-- Header --}}
        <div class="bg-white px-8 pt-8 pb-4 text-center">
            <h2 class="text-3xl font-bold tracking-tight text-stone-800">Admin Login</h2>
            <p class="text-sm text-stone-400 mt-1">Sign in to access your dashboard</p>
        </div>

        {{-- Body --}}
        <div class="bg-white px-8 pb-8 space-y-6">

            {{-- Clickable Demo Admin Login Box --}}
            <div onclick="fillDemoCredentials()"
                class="bg-indigo-50/60 border border-indigo-100 hover:border-indigo-300 rounded-xl p-4 text-center cursor-pointer select-none group transition duration-200">
                <p class="text-xs font-semibold uppercase tracking-wider text-indigo-600 group-hover:text-indigo-700">
                    <i class="fas fa-magic mr-1 animate-pulse"></i> Demo Admin Login
                </p>
                <p class="text-sm text-stone-600 mt-1 font-medium">Email: <span class="text-stone-900 underline decoration-indigo-200" id="demo-email">admin@email.com</span></p>
                <p class="text-sm text-stone-600 font-medium">Password: <span class="text-stone-900 underline decoration-indigo-200" id="demo-pass">12345678</span></p>
                <span class="text-[10px] text-indigo-400 font-medium block mt-1.5 uppercase tracking-wide opacity-80 group-hover:opacity-100">Click box to autofill</span>
            </div>

            {{-- Form --}}
            <form method="POST" action="{{ route('admin.login') }}" class="space-y-4">
                @csrf

                {{-- Email Input --}}
                <div class="space-y-1">
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-stone-400">
                            <i class="far fa-envelope"></i>
                        </span>
                        <input type="email" name="email" id="admin-email" value="{{ old('email') }}" placeholder="Email Address" required
                            class="w-full bg-stone-50 border @error('email') border-rose-500 focus:ring-rose-500/20 focus:border-rose-500 @else border-stone-200 focus:ring-indigo-500/20 focus:border-indigo-500 @enderror rounded-full pl-11 pr-5 py-3 text-sm transition outline-none focus:ring-4">
                    </div>
                    @error('email')
                    <p class="text-xs font-medium text-rose-600 pl-3 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password Input --}}
                <div class="space-y-1">
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-stone-400">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" name="password" id="admin-password" placeholder="Password" required
                            class="w-full bg-stone-50 border @error('password') border-rose-500 focus:ring-rose-500/20 focus:border-rose-500 @else border-stone-200 focus:ring-indigo-500/20 focus:border-indigo-500 @enderror rounded-full pl-11 pr-5 py-3 text-sm transition outline-none focus:ring-4">
                    </div>
                    @error('password')
                    <p class="text-xs font-medium text-rose-600 pl-3 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit Button --}}
                <div class="pt-2">
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-[#667eea] to-[#764ba2] hover:shadow-lg hover:shadow-indigo-500/30 text-white font-bold uppercase tracking-wider py-3 px-5 rounded-full shadow transition transform hover:-translate-y-0.5 active:translate-y-0 duration-150">
                        Login
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    function fillDemoCredentials() {
        // Fetch values directly from the UI text
        const email = document.getElementById('demo-email').innerText;
        const pass = document.getElementById('demo-pass').innerText;

        // Push values to form inputs
        document.getElementById('admin-email').value = email;
        document.getElementById('admin-password').value = pass;
    }
</script>
@endpush
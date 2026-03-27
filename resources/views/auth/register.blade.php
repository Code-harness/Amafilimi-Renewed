@extends('layouts.app')

@section('title', 'Join Now')

@section('content')
    <div class="min-h-screen flex items-center justify-center px-4 py-20"
        style="background: radial-gradient(circle at center, var(--color-action-glow) 0%, var(--color-body-bg) 80%);">

        <div
            class="w-full max-w-md bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl p-8 shadow-2xl relative overflow-hidden">

            <div class="absolute -top-24 -right-24 w-48 h-48 bg-[var(--color-action-glow)] blur-[80px] rounded-full"></div>

            <div class="text-center mb-10 relative z-10">
                <a href="/">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo"
                        class="h-10 mx-auto mb-6 transition-transform hover:scale-105">
                </a>
                <h2 class="text-2xl font-black text-white uppercase tracking-widest leading-tight">Create Account</h2>
                <p class="text-gray-400 text-[11px] font-medium uppercase tracking-[0.2em] mt-2">Start your premium journey
                </p>
            </div>

            <form action="{{ route('register') }}" method="POST" class="space-y-5 relative z-10">
                @csrf

                <div class="space-y-2">
                    <label for="email" class="text-[10px] font-black uppercase tracking-widest text-gray-400 ml-1">Email
                        Address</label>
                    <div class="relative">
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                            placeholder="name@example.com"
                            class="w-full bg-white/5 border border-white/10 rounded-xl px-5 py-3 text-sm text-white placeholder-gray-600 focus:ring-1 focus:ring-[var(--color-action)] focus:border-[var(--color-action)] outline-none transition-all hover:bg-white/10">
                        @error('email')
                            <span class="text-[10px] text-red-500 font-bold mt-1 block tracking-tight">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="phone" class="text-[10px] font-black uppercase tracking-widest text-gray-400 ml-1">Phone
                        Number</label>
                    <div class="relative">
                        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required
                            placeholder="+250 --- --- ---"
                            class="w-full bg-white/5 border border-white/10 rounded-xl px-5 py-3 text-sm text-white placeholder-gray-600 focus:ring-1 focus:ring-[var(--color-action)] focus:border-[var(--color-action)] outline-none transition-all hover:bg-white/10">
                        @error('phone')
                            <span class="text-[10px] text-red-500 font-bold mt-1 block tracking-tight">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="password"
                        class="text-[10px] font-black uppercase tracking-widest text-gray-400 ml-1">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password" required placeholder="••••••••"
                            class="w-full bg-white/5 border border-white/10 rounded-xl px-5 py-3 text-sm text-white placeholder-gray-600 focus:ring-1 focus:ring-[var(--color-action)] focus:border-[var(--color-action)] outline-none transition-all hover:bg-white/10">
                        @error('password')
                            <span class="text-[10px] text-red-500 font-bold mt-1 block tracking-tight">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <button type="submit"
                    class="w-full mt-4 bg-[var(--color-action)] hover:bg-[var(--color-action-hover)] text-white py-4 rounded-xl font-black text-xs uppercase tracking-[0.2em] shadow-lg shadow-[var(--color-action-glow)] transition-all active:scale-[0.98]">
                    Get Started
                </button>
            </form>

            <div class="mt-8 text-center space-y-4 relative z-10">
                <p class="text-[11px] text-gray-500 font-bold uppercase tracking-tighter">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-[var(--color-action)] hover:underline ml-1">Sign In</a>
                </p>

                <div class="pt-6 border-t border-white/5">
                    <a href="/"
                        class="text-[10px] text-gray-600 hover:text-gray-400 transition-colors uppercase font-bold tracking-widest">
                        ← Back to Home
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
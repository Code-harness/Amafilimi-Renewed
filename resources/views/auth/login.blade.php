@extends('layouts.app')

@section('title', 'Sign In')

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
                <h2 class="text-2xl font-black text-white uppercase tracking-widest leading-tight">Welcome Back</h2>
                <p class="text-gray-400 text-[11px] font-medium uppercase tracking-[0.2em] mt-2">Sign in via Email or Phone
                </p>
            </div>

            <form action="{{ route('login') }}" method="POST" class="space-y-6 relative z-10">
                @csrf

                <div class="space-y-2">
                    <label for="login" class="text-[10px] font-black uppercase tracking-widest text-gray-400 ml-1">Email or
                        Phone</label>
                    <div class="relative group">
                        <input type="text" id="login" name="login" value="{{ old('login') }}" required
                            placeholder="e.g. name@mail.com or +250..."
                            class="w-full bg-white/5 border border-white/10 rounded-xl px-5 py-3 text-sm text-white placeholder-gray-600 focus:ring-1 focus:ring-[var(--color-action)] focus:border-[var(--color-action)] outline-none transition-all hover:bg-white/10">

                        @error('login')
                            <span class="text-[10px] text-red-500 font-bold mt-1 block tracking-tight">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="space-y-2">
                    <div class="flex justify-between items-center ml-1">
                        <label for="password"
                            class="text-[10px] font-black uppercase tracking-widest text-gray-400">Password</label>
                        <a href="#"
                            class="text-[9px] font-bold uppercase tracking-tighter text-[var(--color-action)] hover:text-white transition-colors">Forgot?</a>
                    </div>
                    <div class="relative group">
                        <input type="password" id="password" name="password" required placeholder="••••••••"
                            class="w-full bg-white/5 border border-white/10 rounded-xl px-5 py-3 text-sm text-white placeholder-gray-600 focus:ring-1 focus:ring-[var(--color-action)] focus:border-[var(--color-action)] outline-none transition-all hover:bg-white/10">
                    </div>
                </div>

                <button type="submit"
                    class="w-full mt-2 bg-[var(--color-action)] hover:bg-[var(--color-action-hover)] text-white py-4 rounded-xl font-black text-xs uppercase tracking-[0.2em] shadow-lg shadow-[var(--color-action-glow)] transition-all active:scale-[0.98]">
                    Sign In
                </button>
            </form>

            <div class="mt-8 text-center space-y-4 relative z-10">
                <p class="text-[11px] text-gray-500 font-bold uppercase tracking-tighter">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-[var(--color-action)] hover:underline ml-1">Register
                        Now</a>
                </p>
            </div>
        </div>
    </div>
@endsection
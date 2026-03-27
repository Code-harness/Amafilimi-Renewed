@extends('layouts.app')

@section('title', 'Sign In')

@section('content')
    <div class="min-h-screen flex flex-col items-center justify-center bg-[var(--color-body-bg)] px-0 sm:px-4">

        <div class="w-full max-w-md bg-white sm:rounded-2xl shadow-[0_20px_50px_rgba(0,0,0,0.3)] overflow-hidden">

            <div class="h-1.5 w-full bg-[var(--color-action)]"></div>

            <div class="p-8 sm:p-10">
                <div class="text-center mb-8">
                    <a href="/" class="inline-block mb-6">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-9 mx-auto brightness-0">
                    </a>
                    <h2 class="text-xl font-black text-gray-900 uppercase tracking-[0.2em]">Welcome Back</h2>
                    <div class="h-px w-12 bg-[var(--color-action)] mx-auto mt-3"></div>
                </div>

                <form action="{{ route('login') }}" method="POST" class="space-y-5">
                    @csrf

                    <div class="flex flex-col gap-1.5">
                        <label for="login" class="text-[10px] font-black uppercase tracking-widest text-gray-400 px-1">
                            Email or Phone
                        </label>
                        <input type="text" id="login" name="login" value="{{ old('login') }}" required
                            placeholder="name@mail.com or +250..."
                            class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3.5 text-sm text-gray-900 placeholder-gray-400 focus:bg-white focus:border-[var(--color-action)] focus:ring-2 focus:ring-[var(--color-action-glow)] outline-none transition-all">

                        @error('login')
                            <span class="text-[10px] text-red-600 font-bold mt-1 px-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <div class="flex justify-between items-center px-1">
                            <label for="password" class="text-[10px] font-black uppercase tracking-widest text-gray-400">
                                Password
                            </label>
                            <a href="#"
                                class="text-[9px] font-bold uppercase text-[var(--color-action)] hover:text-[var(--color-action-hover)] transition-colors">
                                Forgot?
                            </a>
                        </div>
                        <input type="password" id="password" name="password" required placeholder="••••••••"
                            class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3.5 text-sm text-gray-900 placeholder-gray-400 focus:bg-white focus:border-[var(--color-action)] focus:ring-2 focus:ring-[var(--color-action-glow)] outline-none transition-all">
                    </div>

                    <button type="submit"
                        class="w-full mt-4 bg-[var(--color-action)] hover:bg-[var(--color-action-hover)] text-white py-4 rounded-lg font-black text-[11px] uppercase tracking-[0.2em] transition-all active:scale-[0.97] shadow-lg shadow-[var(--color-action-glow)]">
                        Sign In
                    </button>
                </form>

                <div class="mt-10 pt-8 border-t border-gray-100 text-center">
                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mb-4">
                        New to the platform?
                    </p>
                    <a href="{{ route('register') }}"
                        class="inline-block w-full py-3 border border-gray-200 rounded-lg text-[10px] font-black uppercase tracking-widest text-gray-600 hover:bg-gray-50 hover:border-gray-300 transition-all">
                        Create Account
                    </a>
                </div>
            </div>
        </div>

        <a href="/"
            class="mt-8 text-[10px] text-white/50 hover:text-white transition-colors uppercase font-black tracking-[0.3em]">
            ← Back to Home
        </a>
    </div>
@endsection
@extends('layouts.app')

@section('title', 'Manage Profile')

@section('content')
    <div class="min-h-screen bg-[var(--color-body-bg)] py-12 px-0 sm:px-4">

        <div class="max-w-2xl mx-auto bg-white sm:rounded-2xl shadow-[0_20px_50px_rgba(0,0,0,0.3)] overflow-hidden">

            <div class="bg-gray-50 border-b border-gray-100 p-8 sm:p-10 text-center relative">
                <div class="h-1.5 w-full bg-[var(--color-action)] absolute top-0 left-0"></div>

                <div class="relative inline-block">
                    <div
                        class="w-24 h-24 rounded-2xl bg-[var(--color-action)] flex items-center justify-center text-white text-3xl font-black shadow-lg shadow-[var(--color-action-glow)] mx-auto">
                        {{ substr(Auth::user()->name ?? 'U', 0, 1) }}
                    </div>
                    <button
                        class="absolute -bottom-2 -right-2 w-8 h-8 bg-white border border-gray-200 rounded-lg flex items-center justify-center text-gray-500 hover:text-[var(--color-action)] shadow-sm transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"
                                stroke-width="2" />
                            <path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" stroke-width="2" />
                        </svg>
                    </button>
                </div>

                <h2 class="mt-4 text-xl font-black text-gray-900 uppercase tracking-widest">
                    {{ Auth::user()->name ?? 'Username' }}</h2>
                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-[0.2em]">{{ Auth::user()->email ??
                    'member@premium.com' }}</p>
            </div>

            <div class="p-8 sm:p-10">
                <form action="#" method="POST" class="space-y-8">
                    @csrf
                    @method('PATCH')

                    <div class="space-y-5">
                        <h3
                            class="text-[11px] font-black uppercase tracking-[0.3em] text-[var(--color-action)] flex items-center gap-2">
                            <span>Account Details</span>
                            <div class="h-px flex-1 bg-gray-100"></div>
                        </h3>

                        <div class="grid grid-cols-1 gap-5">
                            <div class="flex flex-col gap-1.5">
                                <label class="text-[10px] font-black uppercase tracking-widest text-gray-400 px-1">Full
                                    Name</label>
                                <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}"
                                    class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 text-sm text-gray-900 focus:bg-white focus:border-[var(--color-action)] focus:ring-2 focus:ring-[var(--color-action-glow)] outline-none transition-all">
                            </div>

                            <div class="flex flex-col gap-1.5">
                                <label class="text-[10px] font-black uppercase tracking-widest text-gray-400 px-1">Email
                                    Address</label>
                                <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}"
                                    class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 text-sm text-gray-900 focus:bg-white focus:border-[var(--color-action)] focus:ring-2 focus:ring-[var(--color-action-glow)] outline-none transition-all">
                            </div>
                        </div>
                    </div>

                    <div class="space-y-5">
                        <h3
                            class="text-[11px] font-black uppercase tracking-[0.3em] text-[var(--color-action)] flex items-center gap-2">
                            <span>Security</span>
                            <div class="h-px flex-1 bg-gray-100"></div>
                        </h3>

                        <div class="flex flex-col gap-1.5">
                            <label class="text-[10px] font-black uppercase tracking-widest text-gray-400 px-1">New Password
                                (Leave blank to keep current)</label>
                            <input type="password" name="password" placeholder="••••••••"
                                class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 text-sm text-gray-900 focus:bg-white focus:border-[var(--color-action)] focus:ring-2 focus:ring-[var(--color-action-glow)] outline-none transition-all">
                        </div>
                    </div>

                    <div class="pt-4 flex flex-col sm:flex-row gap-4">
                        <button type="submit"
                            class="flex-1 bg-[var(--color-action)] hover:bg-[var(--color-action-hover)] text-white py-4 rounded-xl font-black text-[11px] uppercase tracking-[0.2em] transition-all active:scale-[0.98] shadow-lg shadow-[var(--color-action-glow)]">
                            Save Changes
                        </button>
                    </div>
                </form>

                <div class="mt-12 pt-8 border-t border-gray-100">
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-6">
                        <div class="text-center sm:text-left">
                            <h4 class="text-[11px] font-black uppercase tracking-widest text-gray-900">Session Management
                            </h4>
                            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-tighter">Exit your current
                                session on this device</p>
                        </div>

                        <form action="#" method="POST" class="w-full sm:w-auto">
                            @csrf
                            <button type="submit"
                                class="w-full px-8 py-3 border-2 border-red-50 hover:bg-red-50 text-red-600 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all">
                                Logout Account
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 text-center">
            <a href="/"
                class="text-[10px] text-white/50 hover:text-white transition-colors uppercase font-black tracking-[0.3em]">
                ← Back to Dashboard
            </a>
        </div>
    </div>
@endsection
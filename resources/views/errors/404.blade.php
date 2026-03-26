@extends('layouts.app')

@section('title', 'Scene Not Found - Plot Hole')

@section('content')
    <div
        class="relative h-[70vh] min-h-[550px] flex items-center justify-center px-6 overflow-hidden bg-[var(--color-body-bg)]">

        <div
            class="absolute top-1/4 left-1/4 w-64 h-64 bg-[var(--color-action)]/10 rounded-full blur-[120px] animate-pulse">
        </div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-purple-600/20 rounded-full blur-[150px]"></div>


        <div class="relative z-10 text-center max-w-2xl mt-12">
            <div class="space-y-4">
                <div class="inline-block">
                    <div class="flex items-center justify-center gap-3 mb-3">
                        <div class="h-[1px] w-8 bg-[var(--color-action)] opacity-50"></div>
                        <p class="text-[var(--color-action)] font-black tracking-[0.5em] uppercase text-[10px] md:text-xs">
                            Missing Reel</p>
                        <div class="h-[1px] w-8 bg-[var(--color-action)] opacity-50"></div>
                    </div>

                    <h2 class="text-4xl md:text-7xl font-[1000] uppercase tracking-tighter leading-none mb-2">
                        Scene Not <span class="text-[var(--color-action)]">Found</span>
                    </h2>
                </div>

                <p class="text-gray-400 text-xs md:text-base font-medium leading-relaxed max-w-sm mx-auto opacity-75">
                    The scene you're looking for was either cut in post-production or erased by a time-traveling villain.
                </p>
            </div>

            <div class="flex flex-col md:flex-row items-center justify-center gap-4 mt-10 md:mt-12">
                <a href="/"
                    class="group relative px-10 py-4 bg-[var(--color-action)] rounded-full overflow-hidden transition-all hover:scale-105 active:scale-95 shadow-xl shadow-[var(--color-action)]/30">
                    <span
                        class="relative z-10 font-black uppercase text-[11px] tracking-widest text-white flex items-center gap-2">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M12 5V1L7 6l5 5V7c3.31 0 6 2.69 6 6s-2.69 6-6 6-6-2.69-6-6H4c0 4.42 3.58 8 8 8s8-3.58 8-8-3.58-8-8-8z" />
                        </svg>
                        Rewind to Home
                    </span>
                    <div
                        class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                    </div>
                </a>

                <button onclick="window.history.back()"
                    class="px-10 py-4 rounded-full border border-white/10 bg-white/5 hover:bg-white/10 hover:border-white/20 transition-all text-[11px] font-black uppercase tracking-widest flex items-center gap-2">
                    <svg class="w-4 h-4 stroke-current" fill="none" viewBox="0 0 24 24" stroke-width="2.5">
                        <path d="M15 19l-7-7 7-7" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Previous Scene
                </button>
            </div>

            <div class="mt-12 flex items-center justify-center gap-4 opacity-40">
                <span class="w-1 h-1 rounded-full bg-gray-600"></span>
                <p class="text-[9px] text-gray-400 font-bold uppercase tracking-[0.3em]">
                    Error: <span class="text-gray-200">REEL_NOT_FOUND</span>
                </p>
            </div>
        </div>
    </div>

    <style>
        @keyframes pulse-slow {

            0%,
            100% {
                opacity: 0.2;
                transform: scale(1);
            }

            50% {
                opacity: 0.4;
                transform: scale(1.02);
            }
        }

        .animate-pulse {
            animation: pulse-slow 8s infinite ease-in-out;
        }

        .font-\[1000\] {
            font-weight: 1000;
        }
    </style>
@endsection
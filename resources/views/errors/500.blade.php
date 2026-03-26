@extends('layouts.app')

@section('title', '500 - Projector Crash')

@section('content')
    <div class="relative h-[70vh] min-h-[550px] flex items-center justify-center px-6 overflow-hidden bg-[var(--color-body-bg)]">

        <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-red-600/10 rounded-full blur-[120px] animate-pulse"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-orange-600/10 rounded-full blur-[150px]"></div>

        <div class="relative z-10 text-center max-w-2xl mt-12">
            <div class="space-y-4">
                <div class="inline-block">
                    <div class="flex items-center justify-center gap-3 mb-3">
                        <div class="h-[1px] w-8 bg-red-500 opacity-50"></div>
                        <p class="text-red-500 font-black tracking-[0.5em] uppercase text-[10px] md:text-xs">
                            Production Error</p>
                        <div class="h-[1px] w-8 bg-red-500 opacity-50"></div>
                    </div>

                    <h2 class="text-4xl md:text-7xl font-[1000] uppercase tracking-tighter leading-none mb-2 text-white">
                        Projector <span class="text-red-500 italic">Crashed</span>
                    </h2>
                </div>

                <p class="text-gray-400 text-xs md:text-base font-medium leading-relaxed max-w-sm mx-auto opacity-75">
                    Our digital projector has overheated. Our engineers are working to fix the reel. Please try reloading the scene.
                </p>
            </div>

            <div class="flex flex-col md:flex-row items-center justify-center gap-4 mt-10 md:mt-12">
                <button onclick="window.location.reload()"
                    class="group relative px-10 py-4 bg-red-600 rounded-full overflow-hidden transition-all hover:scale-105 active:scale-95 shadow-xl shadow-red-600/20">
                    <span class="relative z-10 font-black uppercase text-[11px] tracking-widest text-white flex items-center gap-2">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                            <path d="M17.65 6.35A7.958 7.958 0 0012 4c-4.42 0-7.99 3.58-7.99 8s3.57 8 7.99 8c3.73 0 6.84-2.55 7.73-6h-2.08c-.82 2.33-3.04 4-5.65 4-3.31 0-6-2.69-6-6s2.69-6 6-6c1.66 0 3.14.69 4.22 1.78L13 11h7V4l-2.35 2.35z"/>
                        </svg>
                        Restart Projector
                    </span>
                    <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                </button>

                <a href="/"
                    class="px-10 py-4 rounded-full border border-white/10 bg-white/5 hover:bg-white/10 hover:border-white/20 transition-all text-[11px] font-black uppercase tracking-widest flex items-center gap-2">
                    Exit to Lobby
                </a>
            </div>

            <div class="mt-12 flex items-center justify-center gap-4 opacity-40">
                <span class="w-1 h-1 rounded-full bg-red-600"></span>
                <p class="text-[9px] text-gray-400 font-bold uppercase tracking-[0.3em]">
                    System Code: <span class="text-white">INTERNAL_SERVER_500</span>
                </p>
            </div>
        </div>
    </div>

    <style>
        @keyframes pulse-slow {
            0%, 100% { opacity: 0.2; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(1.05); }
        }

        .animate-pulse {
            animation: pulse-slow 6s infinite ease-in-out;
        }

        .font-\[1000\] {
            font-weight: 1000;
        }
    </style>
@endsection
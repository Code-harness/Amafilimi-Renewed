@extends('layouts.app')

@section('title', '403 - Restricted Access')

@section('content')
    <div class="relative h-[70vh] min-h-[550px] flex items-center justify-center px-6 overflow-hidden bg-[var(--color-body-bg)]">

        <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-amber-600/10 rounded-full blur-[120px] animate-pulse"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-yellow-900/10 rounded-full blur-[150px]"></div>

        <div class="relative z-10 text-center max-w-2xl mt-12">
            <div class="space-y-4">
                <div class="inline-block">
                    <div class="flex items-center justify-center gap-3 mb-3">
                        <div class="h-[1px] w-8 bg-amber-500 opacity-50"></div>
                        <p class="text-amber-500 font-black tracking-[0.5em] uppercase text-[10px] md:text-xs">
                            Private Screening</p>
                        <div class="h-[1px] w-8 bg-amber-500 opacity-50"></div>
                    </div>

                    <h2 class="text-4xl md:text-7xl font-[1000] uppercase tracking-tighter leading-none mb-2 text-white">
                        Access <span class="text-amber-500 italic">Denied</span>
                    </h2>
                </div>

                <p class="text-gray-400 text-xs md:text-base font-medium leading-relaxed max-w-sm mx-auto opacity-75">
                    It looks like you're trying to enter a restricted area. This scene is reserved for authorized personnel or requires a different ticket.
                </p>
            </div>

            <div class="flex flex-col md:flex-row items-center justify-center gap-4 mt-10 md:mt-12">
                <a href="/login"
                    class="group relative px-10 py-4 bg-amber-600 rounded-full overflow-hidden transition-all hover:scale-105 active:scale-95 shadow-xl shadow-amber-600/20">
                    <span class="relative z-10 font-black uppercase text-[11px] tracking-widest text-white flex items-center gap-2">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm6-9h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM9 6c0-1.66 1.34-3 3-3s3 1.34 3 3v2H9V6z"/>
                        </svg>
                        Show Your Credentials
                    </span>
                    <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                </a>

                <a href="/"
                    class="px-10 py-4 rounded-full border border-white/10 bg-white/5 hover:bg-white/10 hover:border-white/20 transition-all text-[11px] font-black uppercase tracking-widest flex items-center gap-2">
                    Back to Lobby
                </a>
            </div>

            <div class="mt-12 flex items-center justify-center gap-4 opacity-40">
                <span class="w-1 h-1 rounded-full bg-amber-600"></span>
                <p class="text-[9px] text-gray-400 font-bold uppercase tracking-[0.3em]">
                    Permission Code: <span class="text-white">FORBIDDEN_403</span>
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
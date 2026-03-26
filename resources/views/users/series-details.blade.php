@extends('layouts.app')

@section('content')
    <div
        class="font-sans selection:bg-[var(--color-action-glow)] text-white w-full bg-[var(--color-body-bg)] overflow-x-hidden">

        <div class="w-full">
            <nav
                class="absolute top-0 left-0 z-40 flex items-center gap-2 text-[8px] font-black tracking-[0.2em] uppercase p-4 md:p-8 opacity-60">
                <a href="#" class="hover:text-[var(--color-action)] transition">Home</a>
                <span class="opacity-30">/</span>
                <span class="text-[var(--color-action)]">The Last of Us</span>
            </nav>

            <div class="relative min-h-[55vh] md:h-[75vh] w-full bg-black">
                <img src="https://images.unsplash.com/photo-1626814026160-2237a95fc5a0?q=80&w=2070&auto=format&fit=crop"
                    class="absolute inset-0 w-full h-full object-cover md:scale-105" alt="Series Hero">

                <div
                    class="absolute inset-0 bg-gradient-to-t from-[var(--color-body-bg)] via-[var(--color-body-bg)]/20 to-transparent z-10">
                </div>
                <div
                    class="absolute inset-0 bg-gradient-to-r from-[var(--color-body-bg)] via-[var(--color-body-bg)]/90 to-transparent opacity-100 z-10 hidden md:block">
                </div>
                <div class="absolute inset-0 bg-black/50 z-10 md:hidden"></div>

                <div
                    class="relative md:absolute inset-0 z-20 flex flex-col items-center md:items-start justify-end px-6 md:px-16 lg:px-24 pb-8 md:pb-16">

                    <div class="w-full md:w-1/2 space-y-3 md:space-y-4 text-center md:text-left">
                        <span
                            class="text-[var(--color-action)] font-black tracking-[0.4em] text-[7px] md:text-[9px] uppercase">HBO
                            Original</span>

                        <h1
                            class="text-3xl md:text-6xl lg:text-7xl font-black tracking-tighter uppercase leading-none drop-shadow-2xl">
                            The Last <br class="hidden md:block"> of Us
                        </h1>

                        <div
                            class="flex items-center justify-center md:justify-start gap-3 text-[9px] md:text-xs font-bold text-gray-300">
                            <span class="text-[var(--color-action)]">98% Match</span>
                            <span class="opacity-40">•</span>
                            <span>2023</span>
                            <span class="opacity-40">•</span>
                            <span>2 Seasons</span>
                        </div>

                        <p
                            class="text-gray-300 text-[10px] md:text-sm max-w-lg font-medium leading-relaxed opacity-80 line-clamp-2 md:line-clamp-none">
                            Twenty years after modern civilization has been destroyed, Joel, a hardened survivor, is hired
                            to smuggle Ellie, a 14-year-old girl, out of an oppressive quarantine zone.
                        </p>

                        <div class="flex flex-col md:flex-row items-center justify-center md:justify-start gap-3 pt-2">
                            <button
                                class="flex items-center justify-center gap-2 bg-[var(--color-action)] text-white px-6 md:px-8 py-2 md:py-3 rounded-full font-black text-[10px] md:text-xs hover:scale-105 transition-all shadow-lg w-full md:w-auto">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z" />
                                </svg>
                                PLAY S1:E1
                            </button>
                            <button
                                class="p-2 md:p-3 rounded-full border border-white/20 bg-white/5 backdrop-blur-md hover:border-[var(--color-action)] transition-all">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                    <path
                                        d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative z-20 bg-[var(--color-body-bg)] px-6 md:px-16 lg:px-24 py-10" x-data="{ season: 1 }">
                <div
                    class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4 border-b border-white/5 pb-6">
                    <h2 class="text-xl font-black uppercase tracking-tighter">Episodes</h2>
                    <div class="flex bg-white/5 p-1 rounded-lg">
                        <button @click="season = 1"
                            :class="season === 1 ? 'bg-[var(--color-action)] text-white shadow-md' : 'text-gray-500'"
                            class="px-5 py-1.5 rounded-md text-[9px] font-black transition-all">SEASON 1</button>
                        <button @click="season = 2"
                            :class="season === 2 ? 'bg-[var(--color-action)] text-white shadow-md' : 'text-gray-500'"
                            class="px-5 py-1.5 rounded-md text-[9px] font-black transition-all">SEASON 2</button>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    @php
                        $episodes = [['no' => 1, 'title' => 'When You\'re Lost in the Darkness', 'dur' => '1h 21m'], ['no' => 2, 'title' => 'Infected', 'dur' => '52m'], ['no' => 3, 'title' => 'Long, Long Time', 'dur' => '1h 15m'], ['no' => 4, 'title' => 'Please Hold to My Hand', 'dur' => '45m']];
                    @endphp
                    @foreach($episodes as $ep)
                        <div
                            class="group flex items-center justify-between p-3 md:p-4 rounded-lg bg-white/[0.02] border border-white/5 hover:bg-white/[0.05] transition-all cursor-pointer">
                            <div class="flex items-center gap-4">
                                <span
                                    class="text-sm font-black text-white/20 group-hover:text-[var(--color-action)] transition-colors">{{ str_pad($ep['no'], 2, '0', STR_PAD_LEFT) }}</span>
                                <h3 class="font-bold text-[11px] md:text-xs text-white/80 capitalize">Episode {{ $ep['no'] }}
                                </h3>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-[8px] font-black text-gray-600">{{ $ep['dur'] }}</span>
                                <div
                                    class="w-6 h-6 rounded-full bg-white/5 flex items-center justify-center group-hover:bg-[var(--color-action)] transition-all">
                                    <svg class="w-3 h-3 fill-white" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="w-full pb-20 px-6 md:px-16 lg:px-24">
                <div class="flex items-center gap-4 mb-6">
                    <h2 class="text-sm font-black uppercase tracking-widest text-gray-400">You May Also Like</h2>
                    <div class="h-[1px] flex-grow bg-white/5"></div>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-3 md:gap-6">
                    @php
                    $similars = [['title' => 'Chernobyl', 'match' => '99%', 'img' =>
                    'https://images.unsplash.com/photo-1536440136628-849c177e76a1?q=80&w=300'],
                    ['title' => 'The Walking Dead', 'match' => '92%', 'img' =>
                    'https://images.unsplash.com/photo-1509248961158-e54f6934749c?q=80&w=300'],
                    ['title' => 'Succession', 'match' => '88%', 'img' =>
                    'https://images.unsplash.com/photo-1478720568477-152d9b164e26?q=80&w=300'], ['title' => 'Breaking Bad',
                    'match' => '97%', 'img' => 'https://images.unsplash.com/photo-1531259683007-016a7b628fc3?q=80&w=300']];
                    @endphp

                    @foreach($similars as $s)
                    <div class="group cursor-pointer">
                        <div class="relative aspect-video rounded-lg overflow-hidden mb-2 border border-white/5">
                            <img src="{{ $s['img'] }}"
                                class="w-full h-full object-cover opacity-70 group-hover:opacity-100 group-hover:scale-105 transition-all duration-500">
                            <div
                                class="absolute top-1.5 right-1.5 bg-black/70 px-1.5 py-0.5 rounded text-[7px] font-black text-[var(--color-action)]">
                                {{ $s['match'] }}
                            </div>
                        </div>
                        <h4 class="text-[10px] md:text-xs font-bold text-white/70 truncate group-hover:text-white">
                            {{ $s['title'] }}</h4>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div
        class="font-sans selection:bg-[var(--color-action-glow)] text-white w-full bg-[var(--color-body-bg)] overflow-x-hidden">

        <div class="w-full">
            <nav
                class="absolute top-0 left-0 z-40 flex items-center gap-2 text-[9px] font-black tracking-[0.2em] uppercase p-6 md:p-10 opacity-70">
                <a href="#" class="hover:text-[var(--color-action)] transition">Home</a>
                <span class="opacity-40">/</span>
                <span class="text-[var(--color-action)]">Interstellar</span>
            </nav>

            <div class="relative min-h-[60vh] md:h-[95vh] w-full bg-black">
                <img src="https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=2072&auto=format&fit=crop"
                    class="absolute inset-0 w-full h-full object-cover md:scale-105" alt="Hero">

                <div
                    class="absolute inset-0 bg-gradient-to-t from-[var(--color-body-bg)] via-[var(--color-body-bg)]/20 to-transparent z-10">
                </div>
                <div
                    class="absolute inset-0 bg-gradient-to-r from-[var(--color-body-bg)] via-transparent to-transparent opacity-90 z-10 hidden md:block">
                </div>
                <div class="absolute inset-0 bg-black/40 z-10 md:hidden"></div>

                <div
                    class="relative md:absolute inset-0 z-20 flex flex-col md:flex-row items-end md:items-center px-6 md:px-16 lg:px-24 pt-32 pb-12 md:py-0">

                    <div class="w-full md:w-2/3 space-y-3 md:space-y-6 text-center md:text-left">
                        <div class="flex items-center justify-center md:justify-start gap-2">
                            <span
                                class="text-[var(--color-action)] font-black tracking-[0.3em] text-[8px] md:text-[10px] uppercase drop-shadow-md">Recommended
                                for you</span>
                        </div>

                        <h1
                            class="text-4xl md:text-8xl lg:text-9xl font-black tracking-tighter uppercase leading-[0.85] drop-shadow-2xl">
                            Interstellar
                        </h1>

                        <div
                            class="flex items-center justify-center md:justify-start gap-3 text-[10px] md:text-xs font-bold text-gray-300">
                            <span
                                class="text-[var(--color-action)] uppercase tracking-widest border border-[var(--color-action)]/30 px-1.5 py-0.5 rounded-sm">99%
                                Match</span>
                            <span>2014</span>
                            <span class="opacity-50">•</span>
                            <span>2h 49m</span>
                            <span class="hidden md:inline-block px-1 border border-white/40 rounded-sm text-[9px]">ULTRA HD
                                4K</span>
                        </div>

                        <div
                            class="flex flex-col md:flex-row items-center justify-center md:justify-start gap-3 pt-4 md:pt-6">
                            <button
                                class="flex items-center justify-center gap-2 bg-white text-black px-6 md:px-10 py-2.5 md:py-4 rounded font-black text-xs md:text-sm hover:bg-[var(--color-action)] hover:text-white transition-all transform active:scale-95 shadow-2xl w-full md:w-auto">
                                <svg class="w-4 h-4 md:w-6 md:h-6 fill-current" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z" />
                                </svg>
                                PLAY
                            </button>

                            <div class="flex gap-3">
                                <button
                                    class="p-2.5 md:p-4 rounded-full border border-white/20 bg-black/40 backdrop-blur-xl hover:border-[var(--color-action)] hover:text-[var(--color-action)] transition-all">
                                    <svg class="w-4 h-4 md:w-6 md:h-6 fill-current" viewBox="0 0 24 24">
                                        <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z" />
                                    </svg>
                                </button>
                                <button
                                    class="p-2.5 md:p-4 rounded-full border border-white/20 bg-black/40 backdrop-blur-xl hover:border-[var(--color-action)] hover:text-[var(--color-action)] transition-all">
                                    <svg class="w-4 h-4 md:w-6 md:h-6 fill-current" viewBox="0 0 24 24">
                                        <path
                                            d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div
                        class="w-full md:w-1/3 mt-10 md:mt-0 md:pl-12 border-t md:border-t-0 md:border-l border-white/10 pt-6 md:pt-0 text-[11px] md:text-xs text-gray-400 space-y-4">
                        <p class="leading-relaxed hidden md:block text-gray-200 text-sm font-light mb-6">
                            When Earth becomes uninhabitable, a team of ex-pilots and scientists travel through a wormhole
                            in search of a new home.
                        </p>
                        <div>
                            <span
                                class="text-white/50 uppercase tracking-[0.2em] text-[9px] font-black block mb-1">Cast</span>
                            <p class="text-white/90">Matthew McConaughey, Anne Hathaway, Jessica Chastain</p>
                        </div>
                        <div>
                            <span
                                class="text-white/50 uppercase tracking-[0.2em] text-[9px] font-black block mb-1">Genres</span>
                            <p class="text-white/90">Sci-Fi, Emotional, Space Drama</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative z-20 bg-[var(--color-body-bg)]">

                <div class="md:hidden px-6 pt-10">
                    <p class="text-gray-300 text-sm leading-relaxed font-light">
                        When Earth becomes uninhabitable, a team of ex-pilots and scientists travel through a wormhole
                        in search of a new home for mankind. A visually stunning journey through space and time.
                    </p>
                </div>

                <div class="w-full py-12 md:py-20 px-6 md:px-16 lg:px-24">
                    <div class="flex items-center justify-between mb-8">
                        <h2 class="text-lg md:text-xl font-black uppercase tracking-widest flex items-center gap-3">
                            <span class="w-8 h-[2px] bg-[var(--color-action)]"></span>
                            More Like This
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-2 gap-x-12 gap-y-6">
                        @php
                            $mocks = [
                                ['title' => 'Inception', 'year' => '2010', 'genre' => 'Sci-Fi • Action', 'img' => 'https://images.unsplash.com/photo-1626814026160-2237a95fc5a0?q=80&w=2070&auto=format&fit=crop'],
                                ['title' => 'The Dark Knight', 'year' => '2008', 'genre' => 'Action • Drama', 'img' => 'https://images.unsplash.com/photo-1478720568477-152d9b164e26?q=80&w=2070&auto=format&fit=crop'],
                                ['title' => 'Tenet', 'year' => '2020', 'genre' => 'Sci-Fi • Thriller', 'img' => 'https://images.unsplash.com/photo-1440404653325-ab127d49abc1?q=80&w=2070&auto=format&fit=crop'],
                                ['title' => 'The Prestige', 'year' => '2006', 'genre' => 'Mystery • Sci-Fi', 'img' => 'https://images.unsplash.com/photo-1517604931442-7e0c8ed2963c?q=80&w=2070&auto=format&fit=crop'],
                            ];
                        @endphp

                        @foreach($mocks as $m)
                            <div
                                class="group flex items-center gap-4 bg-white/5 hover:bg-white/10 p-2 rounded-lg transition-all cursor-pointer">
                                <div
                                    class="relative h-20 md:h-24 w-32 md:w-40 flex-shrink-0 overflow-hidden rounded-md border border-white/10 group-hover:border-[var(--color-action)]/50 transition-colors">
                                    <img src="{{ $m['img'] }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition-colors">
                                    </div>
                                </div>

                                <div class="flex-grow min-w-0">
                                    <div class="flex items-center gap-2 mb-1">
                                        <span class="text-[var(--color-action)] text-[9px] font-bold tracking-tighter">94%
                                            MATCH</span>
                                        <span class="text-gray-500 text-[9px] font-bold">{{ $m['year'] }}</span>
                                    </div>
                                    <h3
                                        class="text-sm md:text-base font-bold text-white group-hover:text-[var(--color-action)] transition-colors truncate">
                                        {{ $m['title'] }}
                                    </h3>
                                    <p class="text-[10px] text-gray-500 font-medium uppercase tracking-wider mt-0.5">
                                        {{ $m['genre'] }}</p>
                                </div>

                                <button
                                    class="mr-4 p-2 rounded-full border border-white/20 hover:bg-[var(--color-action)] hover:text-white transition">
                                    <svg class="w-3 h-3 md:w-4 md:h-4 fill-current" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z" />
                                    </svg>
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
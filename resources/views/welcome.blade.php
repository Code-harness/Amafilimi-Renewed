@php
    $carouselItems = collect([
        [
            'title' => 'Spider-Man: No Way Home',
            'rating' => '8.2',
            'tags' => 'Action • Sci-Fi',
            'desc' => 'With Spider-Man\'s identity now revealed, Peter asks Doctor Strange for help. When a spell goes wrong, dangerous foes from other worlds start to appear.',
            'image' => 'https://images.unsplash.com/photo-1635805737707-575885ab0820?q=80&w=1974'
        ],
        [
            'title' => 'Dune: Part Two',
            'rating' => '8.9',
            'tags' => 'Adventure • Drama',
            'desc' => 'Paul Atreides unites with Chani and the Fremen while on a warpath of revenge against the conspirators who destroyed his family.',
            'image' => 'https://images.unsplash.com/photo-1509248961158-e54f6934749c?q=80&w=1974'
        ],
        [
            'title' => 'The Batman',
            'rating' => '7.8',
            'tags' => 'Crime • Mystery',
            'desc' => 'When a sadistic serial killer begins murdering key political figures in Gotham, Batman is forced to investigate the city\'s hidden corruption.',
            'image' => 'https://images.unsplash.com/photo-1531259683007-016a7b628fc3?q=80&w=1974'
        ],
        [
            'title' => 'Oppenheimer',
            'rating' => '8.4',
            'tags' => 'History • Thriller',
            'desc' => 'The story of American scientist J. Robert Oppenheimer and his role in the development of the atomic bomb.',
            'image' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=1974'
        ]
    ])->take(10)->toArray();

    $movies = [
        ['title' => 'The Wonder', 'sub' => '2022 • Mystery', 'rating' => '6.8', 'img' => 'https://images.unsplash.com/photo-1485846234645-a62644f84728?q=80&w=300'],
        ['title' => 'Interstellar', 'sub' => '2014 • Sci-Fi', 'rating' => '9.0', 'img' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=300'],
        ['title' => 'Inception', 'sub' => '2010 • Sci-Fi', 'rating' => '8.8', 'img' => 'https://images.unsplash.com/photo-1478720568477-152d9b164e26?q=80&w=300'],
        ['title' => 'The Whale', 'sub' => '2022 • Drama', 'rating' => '7.7', 'img' => 'https://images.unsplash.com/photo-1594908900066-3f47337549d8?q=80&w=300'],
        ['title' => 'Blade Runner 2049', 'sub' => '2017 • Sci-Fi', 'rating' => '8.0', 'img' => 'https://images.unsplash.com/photo-1536440136628-849c177e76a1?q=80&w=300'],
        ['title' => 'Top Gun: Maverick', 'sub' => '2022 • Action', 'rating' => '8.3', 'img' => 'https://images.unsplash.com/photo-1508700115892-45ecd05ae2ad?q=80&w=300'],
    ];
@endphp

@extends('layouts.app')

@section('content')
    {{-- Main Container: Removed px-2, added larger vertical gap --}}
    <div class="space-y-20 pb-20 w-full">

        {{-- Hero Carousel Section --}}
        <section x-data="{ 
                            active: 0, 
                            total: {{ count($carouselItems) }},
                            autoplayInterval: null,
                            init() { this.startAutoplay(); },
                            startAutoplay() { this.autoplayInterval = setInterval(() => { this.next(); }, 6000); },
                            stopAutoplay() { clearInterval(this.autoplayInterval); },
                            next() { this.active = (this.active + 1) % this.total },
                            prev() { this.active = (this.active - 1 + this.total) % this.total }
                        }" @mouseenter="stopAutoplay()" @mouseleave="startAutoplay()"
            class="relative h-[550px] md:h-[650px] w-full overflow-hidden shadow-2xl group transition-all duration-700"
            style="background-color: var(--color-body-bg);">

            @foreach($carouselItems as $index => $item)
                <div x-show="active === {{ $index }}" x-transition:enter="transition ease-out duration-1000"
                    x-transition:enter-start="opacity-0 scale-110" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-500" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0" class="absolute inset-0">

                    {{-- Image with subtle parallax feel --}}
                    <img src="{{ $item['image'] }}" class="absolute inset-0 w-full h-full object-cover origin-center">

                    {{-- Multi-layered Cinematic Overlays --}}
                    <div class="absolute inset-0 z-10 bg-black/20"></div>
                    <div
                        class="absolute inset-0 z-20 bg-gradient-to-r from-[var(--color-body-bg)] via-[var(--color-body-bg)]/40 to-transparent">
                    </div>
                    <div
                        class="absolute inset-0 z-20 bg-gradient-to-t from-[var(--color-body-bg)] via-transparent to-transparent">
                    </div>

                    {{-- Content: Increased padding for "Space" --}}
                    <div class="absolute bottom-16 left-6 md:left-16 lg:left-24 max-w-2xl z-30">
                        <div class="flex items-center gap-4 mb-5">
                            <span
                                class="bg-[var(--color-action)] text-white text-[10px] font-black px-3 py-1 rounded-md uppercase shadow-xl shadow-[var(--color-action)]/20">
                                ★ {{ $item['rating'] }} IMDB
                            </span>
                            <span
                                class="text-[var(--color-action)] font-black text-[11px] tracking-[0.2em] uppercase">{{ $item['tags'] }}</span>
                        </div>

                        <h1
                            class="text-5xl md:text-7xl lg:text-8xl font-black mb-4 tracking-tighter leading-[0.9] uppercase text-white drop-shadow-2xl">
                            {{ $item['title'] }}
                        </h1>

                        <p
                            class="text-gray-200 text-base md:text-lg leading-relaxed mb-8 line-clamp-3 opacity-80 font-medium max-w-xl">
                            {{ $item['desc'] }}
                        </p>

                        <div class="flex items-center gap-4">
                            <button
                                class="bg-white text-black hover:bg-[var(--color-action)] hover:text-white px-10 py-4 rounded-xl font-black transition-all duration-300 shadow-2xl uppercase text-[12px] tracking-widest active:scale-95">
                                Watch Now
                            </button>

                            <button
                                class="p-4 rounded-xl bg-white/10 backdrop-blur-xl border border-white/10 hover:border-[var(--color-action)] hover:text-[var(--color-action)] transition-all duration-300 text-white group/btn">
                                <svg class="w-6 h-6 group-hover/btn:scale-110 transition-transform" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 4v16m8-8H4" stroke-width="3" stroke-linecap="round" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- Navigation Indicators: Moved to far right with more space --}}
            <div class="absolute bottom-16 right-8 md:right-16 flex flex-col gap-3 z-40">
                @foreach($carouselItems as $index => $item)
                    <button @click="active = {{ $index }}"
                        :class="active === {{ $index }} ? 'h-10 bg-[var(--color-action)] shadow-[0_0_15px_var(--color-action)]' : 'h-3 bg-white/20 hover:bg-white/40'"
                        class="w-1.5 rounded-full transition-all duration-500"></button>
                @endforeach
            </div>
        </section>

        {{-- Latest Releases Section --}}
        <section class="w-full px-6 md:px-16 lg:px-24">
            <div class="flex justify-between items-end mb-10">
                <div class="space-y-1">
                    <h2 class="text-xl md:text-3xl font-black tracking-tighter uppercase text-white leading-none">
                        Latest Releases
                    </h2>
                    <div class="h-[3px] w-12 bg-[var(--color-action)]"></div>
                </div>
                <a href="#"
                    class="group flex items-center gap-2 text-[10px] font-bold text-gray-500 hover:text-[var(--color-action)] uppercase tracking-[0.2em] transition-all">
                    Explore All
                    <svg class="w-3 h-3 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path d="M9 5l7 7-7 7" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 md:gap-6">
                @foreach($movies as $movie)
                    <div class="group cursor-pointer relative">
                        {{-- Card Container: Reduced Radius (rounded-xl/2xl) --}}
                        <div
                            class="relative aspect-[2/3] rounded-xl md:rounded-2xl overflow-hidden bg-gray-900 border border-white/10 mb-3 transition-all duration-500 
                                    group-hover:-translate-y-2 group-hover:shadow-[0_20px_40px_-15px_rgba(0,0,0,0.7)] group-hover:border-[var(--color-action)]/30">

                            {{-- Poster Image --}}
                            <img src="{{ $movie['img'] }}"
                                class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110 group-hover:rotate-1">

                            {{-- Hover Glow Overlay --}}
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-60 group-hover:opacity-40 transition-opacity">
                            </div>

                            {{-- Play Icon (Modern Minimalist) --}}
                            <div
                                class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-500">
                                <div
                                    class="w-12 h-12 rounded-full bg-[var(--color-action)] text-white flex items-center justify-center shadow-[0_0_20px_var(--color-action-glow)] transform scale-75 group-hover:scale-100 transition-transform duration-500">
                                    <svg class="w-6 h-6 fill-current ml-1" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z" />
                                    </svg>
                                </div>
                            </div>

                            {{-- Floating Rating Badge --}}
                            <div
                                class="absolute top-3 left-3 flex items-center gap-1.5 bg-black/60 backdrop-blur-md px-2 py-1 rounded-md border border-white/10 text-[9px] font-black text-white shadow-lg">
                                <svg class="w-2.5 h-2.5 text-[var(--color-action)] fill-current" viewBox="0 0 24 24">
                                    <path
                                        d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z" />
                                </svg>
                                {{ $movie['rating'] }}
                            </div>
                        </div>

                        {{-- Title Info --}}
                        <div class="px-1 space-y-0.5">
                            <h3
                                class="text-[13px] md:text-sm font-bold truncate text-white/90 group-hover:text-[var(--color-action)] transition-colors duration-300">
                                {{ $movie['title'] }}
                            </h3>
                            <div class="flex items-center gap-2 overflow-hidden">
                                <p class="text-[9px] text-gray-500 font-bold uppercase tracking-wider truncate shrink-0">
                                    {{ explode(' • ', $movie['sub'])[0] }}
                                </p>
                                <span class="w-1 h-1 rounded-full bg-gray-700"></span>
                                <p class="text-[9px] text-[var(--color-action)] font-black uppercase truncate italic">
                                    {{ explode(' • ', $movie['sub'])[1] ?? 'Action' }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

    </div>

    {{-- Hide scrollbar for clean horizontal feeling --}}
    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
@endsection
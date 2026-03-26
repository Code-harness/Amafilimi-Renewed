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
    <div class="space-y-12 pb-8 pt-4">

        <section x-data="{ 
                    active: 0, 
                    total: {{ count($carouselItems) }},
                    autoplayInterval: null,
                    init() { this.startAutoplay(); },
                    startAutoplay() { this.autoplayInterval = setInterval(() => { this.next(); }, 5000); },
                    stopAutoplay() { clearInterval(this.autoplayInterval); },
                    next() { this.active = (this.active + 1) % this.total },
                    prev() { this.active = (this.active - 1 + this.total) % this.total }
                }" @mouseenter="stopAutoplay()" @mouseleave="startAutoplay()"
            class="relative h-[480px] rounded-[3rem] overflow-hidden shadow-2xl mx-2 group"
            style="background-color: var(--color-body-bg);">
            
            @foreach($carouselItems as $index => $item)
                <div x-show="active === {{ $index }}" x-transition:enter="transition ease-out duration-1000"
                    x-transition:enter-start="opacity-0 scale-105" x-transition:enter-end="opacity-100 scale-100"
                    class="absolute inset-0">

                    <img src="{{ $item['image'] }}" class="absolute inset-0 w-full h-full object-cover">

                    <div class="absolute inset-0 z-10" style="background-color: var(--color-hero-overlay);"></div>

                    <div class="absolute inset-0 z-20 bg-gradient-to-r from-[rgb(2,33,48)] via-[rgb(2,33,48)]/40 to-transparent"></div>
                    <div class="absolute inset-0 z-20 bg-gradient-to-t from-[rgb(2,33,48)] via-transparent to-transparent"></div>

                    <div class="absolute bottom-10 left-10 max-w-xl z-30">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="bg-[rgb(4,145,23)] text-white text-[9px] font-black px-2 py-0.5 rounded-md uppercase shadow-lg shadow-[rgb(4,145,23)]/20">
                               ★ {{ $item['rating'] }} IMDB
                            </span>
                            <span class="text-green-500 font-bold text-[11px] tracking-wide">{{ $item['tags'] }}</span>
                        </div>
                        
                        <h1 class="text-4xl md:text-5xl font-black mb-3 tracking-tighter leading-none uppercase text-white">
                            {{ $item['title'] }}
                        </h1>
                        
                        <p class="text-gray-200 text-sm leading-relaxed mb-6 line-clamp-2 opacity-90">
                            {{ $item['desc'] }}
                        </p>

                        <div class="flex items-center gap-3">
                            <button class="bg-[rgb(4,145,23)] hover:bg-[rgb(5,170,27)] px-8 py-3 rounded-xl font-black transition-all duration-300 shadow-lg shadow-[rgb(4,145,23)]/20 hover:shadow-[rgb(4,145,23)]/40 uppercase text-[11px] tracking-widest text-white">
                                Watch Now
                            </button>
                            
                            <button class="p-3 rounded-xl bg-white/5 backdrop-blur-md border border-white/10 hover:border-[rgb(4,145,23)] hover:text-[rgb(4,145,23)] transition-all duration-300 text-white">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4" stroke-width="2.5" stroke-linecap="round"/></svg>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="absolute bottom-10 right-10 flex flex-col gap-2 z-40">
                @foreach($carouselItems as $index => $item)
                    <button @click="active = {{ $index }}"
                        :class="active === {{ $index }} ? 'h-6 bg-[rgb(4,145,23)] shadow-[0_0_12px_rgb(4,145,23)]' : 'h-2 bg-white/20'"
                        class="w-1 rounded-full transition-all duration-500"></button>
                @endforeach
            </div>
        </section>

        <section class="px-2">
            <div class="flex justify-between items-end mb-6">
                <h2 class="text-xl font-black tracking-tight uppercase border-l-4 border-[rgb(4,145,23)] pl-4 text-white">Latest Releases</h2>
                <a href="#" class="text-[10px] font-bold text-gray-400 hover:text-green-500 uppercase tracking-widest transition">See All</a>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4">
                @foreach($movies as $movie)
                    <div class="group cursor-pointer">
                        <div class="relative aspect-[2/3] rounded-[2rem] overflow-hidden bg-slate-900/50 border border-white/5 mb-2 shadow-lg">
                            <img src="{{ $movie['img'] }}"
                                class="w-full h-full object-cover opacity-80 group-hover:opacity-100 group-hover:scale-110 transition duration-700">

                            <div class="absolute inset-0 bg-[rgb(4,145,23)]/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <div class="w-12 h-12 rounded-full bg-[rgb(4,145,23)] flex items-center justify-center shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                    <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                </div>
                            </div>

                            <div class="absolute top-3 left-3 bg-black/60 backdrop-blur-md px-2 py-0.5 rounded-lg border border-white/5 text-[9px] font-black italic text-white">
                                {{ $movie['rating'] }}
                            </div>
                        </div>
                        <h3 class="text-xs font-bold truncate text-white group-hover:text-green-500 transition px-1">
                            {{ $movie['title'] }}</h3>
                        <p class="text-[9px] text-gray-500 uppercase tracking-tighter px-1">{{ $movie['sub'] }}</p>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection
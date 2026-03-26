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
        ['title' => 'The Wonder', 'sub' => '2022 • Mystery', 'rating' => '6.8', 'img' => 'https://images.unsplash.com/photo-1485846234645-a62644f84728?q=80&w=300'],
        ['title' => 'Interstellar', 'sub' => '2014 • Sci-Fi', 'rating' => '9.0', 'img' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=300'],
        ['title' => 'Inception', 'sub' => '2010 • Sci-Fi', 'rating' => '8.8', 'img' => 'https://images.unsplash.com/photo-1478720568477-152d9b164e26?q=80&w=300'],
        ['title' => 'The Whale', 'sub' => '2022 • Drama', 'rating' => '7.7', 'img' => 'https://images.unsplash.com/photo-1594908900066-3f47337549d8?q=80&w=300'],
        ['title' => 'Blade Runner 2049', 'sub' => '2017 • Sci-Fi', 'rating' => '8.0', 'img' => 'https://images.unsplash.com/photo-1536440136628-849c177e76a1?q=80&w=300'],
        ['title' => 'Top Gun: Maverick', 'sub' => '2022 • Action', 'rating' => '8.3', 'img' => 'https://images.unsplash.com/photo-1508700115892-45ecd05ae2ad?q=80&w=300'],
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
            class="relative h-[550px] md:h-[750px] w-full overflow-hidden shadow-2xl group transition-all duration-700"
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
            <div class="flex justify-between items-end mb-8">
                <div class="space-y-1">
                    <h2 class="text-xl md:text-2xl font-black tracking-tighter uppercase text-white leading-none">
                        Latest Releases
                    </h2>
                    <div class="h-[2px] w-10 bg-[var(--color-action)]"></div>
                </div>
                <a href="#"
                    class="group flex items-center gap-2 text-[9px] font-bold text-gray-500 hover:text-[var(--color-action)] uppercase tracking-[0.2em] transition-all">
                    Explore All
                    <svg class="w-3 h-3 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path d="M9 5l7 7-7 7" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>

            <div class="flex overflow-x-auto gap-4 md:gap-6 pb-8 snap-x snap-mandatory scrollbar-hide no-scrollbar">
                @foreach($movies as $movie)
                    <x-cards.movies :movie="$movie"></x-cards.movies>
                @endforeach
            </div>
        </section>

        <style>
            /* Utility to hide scrollbar while keeping functionality */
            .no-scrollbar::-webkit-scrollbar {
                display: none;
            }

            .no-scrollbar {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }
        </style>

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
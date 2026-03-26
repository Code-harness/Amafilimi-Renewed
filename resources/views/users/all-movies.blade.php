@php

    // Mock data for the movie list

    $allMovies = [

        ['title' => 'Spider-Man: No Way Home', 'year' => '2021', 'type' => 'Action', 'rating' => '8.2', 'img' => 'https://images.unsplash.com/photo-1635805737707-575885ab0820?q=80&w=400'],

        ['title' => 'Dune: Part Two', 'year' => '2024', 'type' => 'Adventure', 'rating' => '8.9', 'img' => 'https://images.unsplash.com/photo-1509248961158-e54f6934749c?q=80&w=400'],

        ['title' => 'The Batman', 'year' => '2022', 'type' => 'Crime', 'rating' => '7.8', 'img' => 'https://images.unsplash.com/photo-1531259683007-016a7b628fc3?q=80&w=400'],

        ['title' => 'Oppenheimer', 'year' => '2023', 'type' => 'History', 'rating' => '8.4', 'img' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=400'],

        ['title' => 'Interstellar', 'year' => '2014', 'type' => 'Sci-Fi', 'rating' => '9.0', 'img' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=400'],

        ['title' => 'Inception', 'year' => '2010', 'type' => 'Sci-Fi', 'rating' => '8.8', 'img' => 'https://images.unsplash.com/photo-1478720568477-152d9b164e26?q=80&w=400'],

        ['title' => 'Oppenheimer', 'year' => '2023', 'type' => 'History', 'rating' => '8.4', 'img' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=400'],

        ['title' => 'Interstellar', 'year' => '2014', 'type' => 'Sci-Fi', 'rating' => '9.0', 'img' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=400'],
        ['title' => 'Spider-Man: No Way Home', 'year' => '2021', 'type' => 'Action', 'rating' => '8.2', 'img' => 'https://images.unsplash.com/photo-1635805737707-575885ab0820?q=80&w=400'],

        ['title' => 'Dune: Part Two', 'year' => '2024', 'type' => 'Adventure', 'rating' => '8.9', 'img' => 'https://images.unsplash.com/photo-1509248961158-e54f6934749c?q=80&w=400'],

        ['title' => 'The Batman', 'year' => '2022', 'type' => 'Crime', 'rating' => '7.8', 'img' => 'https://images.unsplash.com/photo-1531259683007-016a7b628fc3?q=80&w=400'],

        ['title' => 'Spider-Man: No Way Home', 'year' => '2021', 'type' => 'Action', 'rating' => '8.2', 'img' => 'https://images.unsplash.com/photo-1635805737707-575885ab0820?q=80&w=400'],

        ['title' => 'Dune: Part Two', 'year' => '2024', 'type' => 'Adventure', 'rating' => '8.9', 'img' => 'https://images.unsplash.com/photo-1509248961158-e54f6934749c?q=80&w=400'],

        ['title' => 'The Batman', 'year' => '2022', 'type' => 'Crime', 'rating' => '7.8', 'img' => 'https://images.unsplash.com/photo-1531259683007-016a7b628fc3?q=80&w=400'],

        ['title' => 'Oppenheimer', 'year' => '2023', 'type' => 'History', 'rating' => '8.4', 'img' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=400'],

        ['title' => 'Interstellar', 'year' => '2014', 'type' => 'Sci-Fi', 'rating' => '9.0', 'img' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=400'],

        ['title' => 'Inception', 'year' => '2010', 'type' => 'Sci-Fi', 'rating' => '8.8', 'img' => 'https://images.unsplash.com/photo-1478720568477-152d9b164e26?q=80&w=400'],

        ['title' => 'Oppenheimer', 'year' => '2023', 'type' => 'History', 'rating' => '8.4', 'img' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=400'],

        ['title' => 'Interstellar', 'year' => '2014', 'type' => 'Sci-Fi', 'rating' => '9.0', 'img' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=400'],

        ['title' => 'Oppenheimer', 'year' => '2023', 'type' => 'History', 'rating' => '8.4', 'img' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=400'],

        ['title' => 'Interstellar', 'year' => '2014', 'type' => 'Sci-Fi', 'rating' => '9.0', 'img' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=400'],

        ['title' => 'Inception', 'year' => '2010', 'type' => 'Sci-Fi', 'rating' => '8.8', 'img' => 'https://images.unsplash.com/photo-1478720568477-152d9b164e26?q=80&w=400'],

        ['title' => 'Oppenheimer', 'year' => '2023', 'type' => 'History', 'rating' => '8.4', 'img' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=400'],

        ['title' => 'Interstellar', 'year' => '2014', 'type' => 'Sci-Fi', 'rating' => '9.0', 'img' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=400'],
    ];


    $categories = ['All', 'Action', 'Adventure', 'Sci-Fi', 'Drama', 'Horror', 'Anime', 'Comedy'];

@endphp

@extends('layouts.app')

@section('content')
    <div class="w-full px-4 sm:px-6 lg:px-10 py-8 space-y-8">

        <nav class="flex items-center gap-2 text-[9px] font-black uppercase tracking-[0.2em] text-gray-500">
            <a href="/" class="hover:text-[rgb(4,145,23)] transition">Home</a>
            <span>/</span>
            <span class="text-gray-300 uppercase italic">Movie Library</span>
        </nav>

        <div class="flex items-center gap-2 overflow-x-auto pb-2 scrollbar-hide border-b border-white/5">
            @foreach($categories as $category)
                <button class="whitespace-nowrap px-4 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-wider transition-all duration-300
                            {{ $category === 'All'
                ? 'bg-[rgb(4,145,23)] text-white shadow-lg shadow-[rgb(4,145,23)]/20'
                : 'bg-white/5 text-gray-400 border border-white/10 hover:border-white/20 hover:text-white' 
                            }}">
                    {{ $category }}
                </button>
            @endforeach
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 gap-x-3 gap-y-10">
            @foreach($allMovies as $movie)
                <div class="group relative">
                    <div
                        class="relative aspect-[2/3] rounded-xl overflow-hidden bg-black shadow-xl transition-all duration-500 group-hover:-translate-y-1.5 group-hover:shadow-[rgb(4,145,23)]/20">

                        <img src="{{ $movie['img'] }}"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">

                        <div class="absolute top-2 left-2 z-20">
                            <div
                                class="bg-black/80 backdrop-blur-md px-1.5 py-0.5 rounded border border-white/10 text-[8px] font-black text-white">
                                <span class="text-[rgb(4,145,23)]">★</span> {{ $movie['rating'] }}
                            </div>
                        </div>

                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-3">
                            <div
                                class="backdrop-blur-xl bg-white/5 border border-white/10 rounded-lg p-2 translate-y-2 group-hover:translate-y-0 transition-transform duration-500">
                                <button
                                    class="w-full bg-[rgb(4,145,23)] py-1.5 rounded text-[9px] font-black uppercase tracking-tighter text-white hover:brightness-110 transition">
                                    Watch Now
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 px-0.5">
                        <h3
                            class="text-[11px] font-bold text-white truncate group-hover:text-[rgb(4,145,23)] transition-colors">
                            {{ $movie['title'] }}
                        </h3>
                        <div class="flex items-center justify-between mt-1">
                            <span
                                class="text-[9px] font-bold text-gray-500 uppercase tracking-tighter">{{ $movie['year'] }}</span>
                            <span class="text-[8px] font-black text-[rgb(4,145,23)] uppercase">4K</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <nav class="flex justify-center items-center gap-2 pt-10">
            <button
                class="w-8 h-8 rounded-lg bg-white/5 border border-white/10 text-gray-500 hover:text-white transition-all">
                <svg class="w-3 h-3 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M15 19l-7-7 7-7" stroke-width="3" stroke-linecap="round" />
                </svg>
            </button>
            <div class="flex gap-1.5">
                <button class="w-8 h-8 rounded-lg bg-[rgb(4,145,23)] text-white font-black text-[10px]">1</button>
                <button
                    class="w-8 h-8 rounded-lg bg-white/5 border border-white/10 text-gray-500 text-[10px] font-black hover:text-white transition">2</button>
            </div>
            <button
                class="w-8 h-8 rounded-lg bg-white/5 border border-white/10 text-gray-500 hover:text-white transition-all">
                <svg class="w-3 h-3 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M9 5l7 7-7 7" stroke-width="3" stroke-linecap="round" />
                </svg>
            </button>
        </nav>
    </div>
@endsection
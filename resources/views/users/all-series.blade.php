@php
    $series = [
        ['title' => 'The Boys', 'seasons' => '4 Seasons', 'rating' => '8.7', 'network' => 'Amazon', 'img' => 'https://images.unsplash.com/photo-1626814026160-2237a95fc5a0?q=80&w=400'],
        ['title' => 'Stranger Things', 'seasons' => '5 Seasons', 'rating' => '8.7', 'network' => 'Netflix', 'img' => 'https://images.unsplash.com/photo-1594909122845-11baa439b7bf?q=80&w=400'],
        ['title' => 'The Last of Us', 'seasons' => '1 Season', 'rating' => '8.8', 'network' => 'HBO', 'img' => 'https://images.unsplash.com/photo-1614741480039-6505b28b23a5?q=80&w=400'],
        ['title' => 'The Bear', 'seasons' => '3 Seasons', 'rating' => '8.6', 'network' => 'Hulu', 'img' => 'https://images.unsplash.com/photo-1559333086-b0a56225a93c?q=80&w=400'],
        ['title' => 'Succession', 'seasons' => '4 Seasons', 'rating' => '8.9', 'network' => 'HBO', 'img' => 'https://images.unsplash.com/photo-1485846234645-a62644f84728?q=80&w=400'],
        ['title' => 'Arcane', 'seasons' => '2 Seasons', 'rating' => '9.0', 'network' => 'Netflix', 'img' => 'https://images.unsplash.com/photo-1536440136628-849c177e76a1?q=80&w=400'],
        // ... repeat for 8-column preview
    ];

    $seriesCategories = ['All Shows', 'Trending', 'New Episodes', 'Documentary', 'Animation', 'Drama'];
@endphp

@extends('layouts.app')

@section('content')
    <div class="w-full px-4 sm:px-6 lg:px-10 py-8 space-y-8">

        <nav class="flex items-center gap-2 text-[9px] font-black uppercase tracking-[0.2em] text-gray-500">
            <a href="/" class="hover:text-[rgb(4,145,23)] transition">Home</a>
            <span>/</span>
            <span class="text-gray-300 uppercase">TV Series</span>
        </nav>

        <div class="flex items-center gap-2 overflow-x-auto pb-2 scrollbar-hide border-b border-white/5">
            @foreach($seriesCategories as $cat)
                <button
                    class="whitespace-nowrap px-4 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-wider transition-all duration-300
                                    {{ $cat === 'All Shows' ? 'bg-[rgb(4,145,23)] text-white shadow-lg shadow-[rgb(4,145,23)]/20' : 'bg-white/5 text-gray-400 border border-white/10 hover:border-[rgb(4,145,23)]/50' }}">
                    {{ $cat }}
                </button>
            @endforeach
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 gap-x-3 gap-y-10">
            @foreach($series as $show)
                <div class="group relative">
                    <div
                        class="relative aspect-[2/3] rounded-xl overflow-hidden bg-black shadow-xl transition-all duration-500 group-hover:-translate-y-2">

                        <img src="{{ $show['img'] }}"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">

                        <div class="absolute top-2 right-2 z-20">
                            <div
                                class="bg-black/60 backdrop-blur-md px-1.5 py-0.5 rounded border border-white/10 text-[7px] font-black text-white uppercase tracking-tighter">
                                {{ $show['network'] }}
                            </div>
                        </div>

                        <div class="absolute top-2 left-2 z-20">
                            <div
                                class="bg-black/80 backdrop-blur-md px-1.5 py-0.5 rounded border border-white/10 text-[8px] font-black text-white">
                                <span class="text-[rgb(4,145,23)]">★</span> {{ $show['rating'] }}
                            </div>
                        </div>

                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-3">
                            <div class="backdrop-blur-xl bg-white/5 border border-white/10 rounded-lg p-2.5">
                                <p class="text-[8px] font-bold text-gray-400 uppercase mb-1">Last Updated: 2d ago</p>
                                <button
                                    class="w-full bg-[rgb(4,145,23)] py-1.5 rounded text-[9px] font-black uppercase text-white hover:brightness-110 transition">
                                    Watch Series
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 px-0.5">
                        <h3
                            class="text-[11px] font-bold text-white truncate group-hover:text-[rgb(4,145,23)] transition-colors">
                            {{ $show['title'] }}
                        </h3>
                        <div class="flex items-center justify-between mt-1">
                            <span
                                class="text-[9px] font-bold text-gray-500 uppercase tracking-tighter">{{ $show['seasons'] }}</span>
                            <span
                                class="flex items-center gap-1 text-[8px] font-black text-gray-400 uppercase tracking-tighter">
                                <span class="w-1.5 h-1.5 rounded-full bg-[rgb(4,145,23)] animate-pulse"></span>
                                ONGOING
                            </span>
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
@php
    $seriesLibrary = [
        [
            'name' => 'The Midnight Sun',
            'seasons_count' => 3,
            'episodes_count' => 24,
            'status' => 'Ongoing',
            'poster' => 'https://images.unsplash.com/photo-1536440136628-849c177e76a1?q=80&w=300&h=400&auto=format&fit=crop',
            'seasons' => [
                ['number' => 1, 'episodes' => ['E01: Pilot', 'E02: The Awakening', 'E03: Dark Tides']],
                ['number' => 2, 'episodes' => ['E01: Resurgence', 'E02: Ghost Signals']],
            ]
        ],
        // ... more series
    ];
@endphp

@extends('layouts.admin')

@section('content')
    <div class="space-y-6" x-data="{ 
            panelOpen: false, 
            activeSeries: null,
            activeSeason: 0,
            openManagement(series) {
                this.activeSeries = series;
                this.panelOpen = true;
                this.activeSeason = 0;
            }
        }">

        {{-- Header --}}
        <div class="flex items-center justify-between bg-white p-6 rounded-[2.5rem] border border-slate-100 shadow-sm">
            <h1 class="text-2xl font-black text-slate-900 tracking-tight">Series Library</h1>
            <button
                class="px-6 py-3 bg-slate-900 text-white rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-emerald-600 transition-all shadow-xl">
                Create New Series
            </button>
        </div>

        {{-- Desktop Table --}}
        <div class="hidden lg:block bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100">
                        <th class="p-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">Series Title</th>
                        <th class="p-6 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">
                            Structure</th>
                        <th class="p-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">Status</th>
                        <th class="p-6 text-right"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach($seriesLibrary as $series)
                        <tr class="group hover:bg-slate-50/50 transition-colors">
                            <td class="p-6">
                                <div class="flex items-center gap-4">
                                    <img src="{{ $series['poster'] }}" class="w-12 h-16 rounded-xl object-cover">
                                    <p class="font-black text-slate-900">{{ $series['name'] }}</p>
                                </div>
                            </td>
                            <td class="p-6 text-center">
                                <span class="px-3 py-1 bg-slate-100 rounded-lg text-[10px] font-black text-slate-600 uppercase">
                                    {{ $series['seasons_count'] }} Seasons • {{ $series['episodes_count'] }} Eps
                                </span>
                            </td>
                            <td class="p-6">
                                <span class="text-[10px] font-black uppercase text-emerald-500">{{ $series['status'] }}</span>
                            </td>
                            <td class="p-6 text-right">
                                <button @click="openManagement({{ json_encode($series) }})"
                                    class="px-5 py-2.5 bg-white border border-slate-200 rounded-xl font-black text-[10px] uppercase tracking-widest text-slate-600 hover:bg-slate-900 hover:text-white hover:border-slate-900 transition-all">
                                    Manage Content
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- SIDE MANAGEMENT PANEL (SLIDE-OVER) --}}
        <div x-show="panelOpen" class="fixed inset-0 z-[100] overflow-hidden" x-cloak>
            <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm transition-opacity" @click="panelOpen = false">
            </div>

            <div class="absolute inset-y-0 right-0 max-w-full flex pl-10">
                <div class="w-screen max-w-md transform transition-all duration-500" x-transition:enter="translate-x-full"
                    x-transition:enter-end="translate-x-0" x-transition:leave="translate-x-full">

                    <div class="h-full flex flex-col bg-white shadow-2xl rounded-l-[3rem] overflow-hidden">
                        {{-- Panel Header --}}
                        <div class="p-8 bg-slate-900 text-white">
                            <div class="flex items-start justify-between">
                                <h2 class="text-2xl font-black tracking-tight" x-text="activeSeries?.name"></h2>
                                <button @click="panelOpen = false"
                                    class="p-2 hover:bg-white/10 rounded-full transition-colors">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            <p class="text-slate-400 text-xs font-bold uppercase tracking-widest mt-2">Content Hierarchy</p>
                        </div>

                        {{-- Season Tabs --}}
                        <div class="flex border-b border-slate-100 overflow-x-auto no-scrollbar">
                            <template x-for="(season, index) in activeSeries?.seasons" :key="index">
                                <button @click="activeSeason = index"
                                    :class="activeSeason === index ? 'border-emerald-500 text-emerald-600' : 'border-transparent text-slate-400'"
                                    class="px-8 py-5 border-b-2 font-black text-[10px] uppercase tracking-[0.2em] transition-all shrink-0">
                                    Season <span x-text="season.number"></span>
                                </button>
                            </template>
                            <button class="px-6 py-5 text-slate-300 hover:text-emerald-500 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-width="3" d="M12 4v16m8-8H4" />
                                </svg>
                            </button>
                        </div>

                        {{-- Episode List --}}
                        <div class="flex-1 overflow-y-auto p-8 space-y-4 bg-slate-50/30">
                            <div class="flex items-center justify-between mb-2">
                                <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Episodes List
                                </h4>
                                <button class="text-[10px] font-black text-emerald-600 uppercase hover:underline">Add
                                    Episode</button>
                            </div>

                            <template x-for="(episode, eIndex) in activeSeries?.seasons[activeSeason]?.episodes"
                                :key="eIndex">
                                <div
                                    class="group bg-white p-4 rounded-2xl border border-slate-100 shadow-sm flex items-center justify-between hover:border-emerald-500/30 transition-all">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 bg-slate-100 rounded-lg flex items-center justify-center text-[10px] font-black text-slate-400"
                                            x-text="eIndex + 1"></div>
                                        <span class="text-sm font-bold text-slate-700" x-text="episode"></span>
                                    </div>
                                    <div class="flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button class="p-2 text-slate-400 hover:text-blue-500"><svg class="w-4 h-4"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-width="2.5"
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg></button>
                                        <button class="p-2 text-slate-400 hover:text-rose-500"><svg class="w-4 h-4"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-width="2.5"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg></button>
                                    </div>
                                </div>
                            </template>
                        </div>

                        {{-- Bottom Action --}}
                        <div class="p-8 border-t border-slate-100">
                            <button
                                class="w-full py-4 bg-slate-900 text-white rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-emerald-600 shadow-xl transition-all">
                                Save Configuration
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <style>
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
@endsection
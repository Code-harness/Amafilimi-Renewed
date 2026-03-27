@extends('layouts.admin')

@section('title', 'Series Library')

@section('content')
    <div class="space-y-6" x-data="{ 
            panelOpen: false, 
            activeSeries: null,
            activeSeasonIndex: 0,
            {{-- This prepares the data for Alpine.js --}}
            openManagement(seriesData) {
                this.activeSeries = seriesData;
                this.activeSeasonIndex = 0;
                this.panelOpen = true;
            }
        }">

        {{-- Header --}}
        <div class="flex items-center justify-between bg-white p-6 rounded-[2.5rem] border border-slate-100 shadow-sm">
            <div>
                <h1 class="text-2xl font-black text-slate-900 tracking-tight">Series Library</h1>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">Manage episodic content & seasons</p>
            </div>
            <a href="{{ route('series.create') }}"
                class="px-6 py-3 bg-emerald-500 text-white rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-emerald-600 transition-all shadow-lg shadow-emerald-100">
                Create New Series
            </a>
        </div>

        {{-- Desktop Table --}}
        <div class="hidden lg:block bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100">
                        <th class="p-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">Series Detail</th>
                        <th class="p-6 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">Structure</th>
                        <th class="p-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">Status</th>
                        <th class="p-6 text-right"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach($seriesList as $series)
                        <tr class="group hover:bg-slate-50/50 transition-colors">
                            <td class="p-6">
                                <div class="flex items-center gap-4">
                                    {{-- Using Accessor for thumbnail or relationship --}}
                                    <img src="{{ $series->content->thumbnail_url ?? asset('images/placeholder.jpg') }}" 
                                         class="w-12 h-16 rounded-xl object-cover shadow-sm">
                                    <div>
                                        <p class="font-black text-slate-900 group-hover:text-emerald-600 transition-colors">
                                            {{ $series->content->title }}
                                        </p>
                                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                                            {{ $series->content->genre }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="p-6 text-center">
                                <span class="px-3 py-1 bg-slate-100 rounded-lg text-[10px] font-black text-slate-600 uppercase">
                                    {{ $series->seasons->count() }} Seasons • {{ $series->episodes_count ?? 0 }} Eps
                                </span>
                            </td>
                            <td class="p-6">
                                <div class="flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full {{ $series->content->status == 'published' ? 'bg-emerald-500' : 'bg-amber-400 animate-pulse' }}"></span>
                                    <span class="text-[10px] font-black uppercase tracking-widest text-slate-700">
                                        {{ $series->content->status }}
                                    </span>
                                </div>
                            </td>
                            <td class="p-6 text-right">
                                {{-- Pass the Eloquent model with relations to the JS function --}}
                                <button @click="openManagement({{ $series->load(['seasons.episodes']) }})"
                                    class="px-5 py-2.5 bg-white border border-slate-200 rounded-xl font-black text-[10px] uppercase tracking-widest text-slate-600 hover:bg-slate-900 hover:text-white hover:border-slate-900 transition-all shadow-sm">
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
            <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm transition-opacity" 
                 x-show="panelOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" 
                 x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                 @click="panelOpen = false">
            </div>

            <div class="absolute inset-y-0 right-0 max-w-full flex pl-10">
                <div class="w-screen max-w-md transform transition-all duration-500" 
                    x-show="panelOpen"
                    x-transition:enter="translate-x-full" x-transition:enter-end="translate-x-0" 
                    x-transition:leave="translate-x-full">

                    <div class="h-full flex flex-col bg-white shadow-2xl rounded-l-[3rem] overflow-hidden">
                        {{-- Panel Header --}}
                        <div class="p-8 bg-slate-900 text-white">
                            <div class="flex items-start justify-between">
                                <div>
                                    <h2 class="text-2xl font-black tracking-tight" x-text="activeSeries?.content?.title"></h2>
                                    <p class="text-emerald-400 text-[10px] font-black uppercase tracking-[0.2em] mt-1">Management Console</p>
                                </div>
                                <button @click="panelOpen = false" class="p-2 hover:bg-white/10 rounded-full transition-colors">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2.5" d="M6 18L18 6M6 6l12 12" /></svg>
                                </button>
                            </div>
                        </div>

                        {{-- Season Tabs --}}
                        <div class="flex border-b border-slate-100 overflow-x-auto no-scrollbar bg-white sticky top-0 z-10">
                            <template x-for="(season, index) in activeSeries?.seasons" :key="season.id">
                                <button @click="activeSeasonIndex = index"
                                    :class="activeSeasonIndex === index ? 'border-emerald-500 text-emerald-600' : 'border-transparent text-slate-400'"
                                    class="px-8 py-5 border-b-2 font-black text-[10px] uppercase tracking-[0.2em] transition-all shrink-0">
                                    Season <span x-text="season.number"></span>
                                </button>
                            </template>
                            <button class="px-6 py-5 text-slate-300 hover:text-emerald-500 transition-colors border-b-2 border-transparent">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="3" d="M12 4v16m8-8H4" /></svg>
                            </button>
                        </div>

                        {{-- Episode List --}}
                        <div class="flex-1 overflow-y-auto p-8 space-y-4 bg-slate-50/30">
                            <div class="flex items-center justify-between mb-2">
                                <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-widest">
                                    Season <span x-text="activeSeries?.seasons[activeSeasonIndex]?.number"></span> Episodes
                                </h4>
                                <button class="text-[10px] font-black text-emerald-600 uppercase hover:underline">Add Episode</button>
                            </div>

                            <template x-for="(episode, eIndex) in activeSeries?.seasons[activeSeasonIndex]?.episodes" :key="episode.id">
                                <div class="group bg-white p-4 rounded-2xl border border-slate-100 shadow-sm flex items-center justify-between hover:border-emerald-500/30 transition-all hover:shadow-md">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 bg-slate-100 rounded-lg flex items-center justify-center text-[10px] font-black text-slate-400"
                                            x-text="eIndex + 1"></div>
                                        <div>
                                            <span class="text-sm font-bold text-slate-700 block" x-text="episode.title"></span>
                                            <span class="text-[9px] font-bold text-slate-400 uppercase" x-text="episode.duration + ' mins'"></span>
                                        </div>
                                    </div>
                                    <div class="flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button class="p-2 text-slate-400 hover:text-emerald-500 transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2.5" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
                                        </button>
                                    </div>
                                </div>
                            </template>

                            {{-- Empty State --}}
                            <template x-if="activeSeries?.seasons[activeSeasonIndex]?.episodes.length === 0">
                                <div class="text-center py-10">
                                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">No episodes found</p>
                                </div>
                            </template>
                        </div>

                        {{-- Bottom Action --}}
                        <div class="p-8 border-t border-slate-100 bg-white">
                            <button class="w-full py-4 bg-slate-900 text-white rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-emerald-600 shadow-xl transition-all active:scale-[0.98]">
                                Save Changes
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        [x-cloak] { display: none !important; }
    </style>
@endsection 
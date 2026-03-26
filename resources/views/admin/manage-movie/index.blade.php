@php
    $recentMedia = [
        ['name' => 'The Midnight Sun', 'genre' => 'Sci-Fi', 'views' => '24.2k', 'status' => 'Published', 'poster' => 'https://images.unsplash.com/photo-1536440136628-849c177e76a1?q=80&w=300&h=400&auto=format&fit=crop', 'progress' => 100],
        ['name' => 'Echoes of Space', 'genre' => 'Documentary', 'views' => '12.1k', 'status' => 'Published', 'poster' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=300&h=400&auto=format&fit=crop', 'progress' => 100],
        ['name' => 'Neon Nights', 'genre' => 'Action', 'views' => '45.8k', 'status' => 'Processing', 'poster' => 'https://images.unsplash.com/photo-1550745165-9bc0b252726f?q=80&w=300&h=400&auto=format&fit=crop', 'progress' => 65],
        ['name' => 'The Last Algorithm', 'genre' => 'Noir', 'views' => '8.4k', 'status' => 'Draft', 'poster' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?q=80&w=300&h=400&auto=format&fit=crop', 'progress' => 0],
        ['name' => 'Velocity Rising', 'genre' => 'Sports', 'views' => '19.0k', 'status' => 'Published', 'poster' => 'https://images.unsplash.com/photo-1511919884226-fd3cad34687c?q=80&w=300&h=400&auto=format&fit=crop', 'progress' => 100],
        ['name' => 'Silent Horizon', 'genre' => 'Adventure', 'views' => '31.2k', 'status' => 'Published', 'poster' => 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?q=80&w=300&h=400&auto=format&fit=crop', 'progress' => 100],
    ];
@endphp

@extends('layouts.admin')

@section('content')<div class="space-y-6" x-data="{ 
        deleteModal: false, 
        activeMovie: '', 
        selectedItems: [],
        allNames: {{ json_encode(collect($recentMedia)->pluck('name')) }},
        toggleAll() {
            if (this.selectedItems.length === this.allNames.length) {
                this.selectedItems = [];
            } else {
                this.selectedItems = [...this.allNames];
            }
        }
    }">

        {{-- Control Bar --}}
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 bg-white p-4 lg:p-6 rounded-[2rem] lg:rounded-[2.5rem] border border-slate-100 shadow-sm sticky top-4 lg:top-20 z-30">
            <div class="flex flex-wrap items-center gap-3 flex-1">
                <div class="relative flex-1 max-w-md">
                    <input type="text" placeholder="Quick find..." class="w-full bg-slate-50 border-none rounded-2xl px-11 py-3 text-sm font-bold focus:ring-2 focus:ring-emerald-500/20">
                    <svg class="w-4 h-4 absolute left-4 top-1/2 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="3" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                </div>

                <div x-show="selectedItems.length > 0" x-transition class="flex items-center gap-1 bg-slate-900 text-white p-1.5 rounded-xl">
                    <span class="text-[10px] font-black uppercase px-3" x-text="selectedItems.length"></span>
                    <button @click="deleteModal = true; activeMovie = selectedItems.length + ' selected items'" class="p-2 bg-rose-500 rounded-lg hover:bg-rose-600 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                    </button>
                </div>
            </div>

            <div class="flex items-center gap-2">
                <button class="flex-1 lg:flex-none px-6 py-3 bg-emerald-500 text-white rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-emerald-600 shadow-lg shadow-emerald-100 transition-all">
                    Add Movie
                </button>
            </div>
        </div>

        {{-- Mobile View: Cards (Hidden on Desktop) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 lg:hidden">
            @foreach($recentMedia as $movie)
                <div class="bg-white p-4 rounded-3xl border border-slate-100 shadow-sm flex gap-4 relative" :class="selectedItems.includes('{{ $movie['name'] }}') ? 'ring-2 ring-emerald-500' : ''">
                    <input type="checkbox" value="{{ $movie['name'] }}" x-model="selectedItems" class="absolute top-2 left-2 z-10 rounded text-emerald-500">
                    <div class="w-20 h-28 bg-slate-100 rounded-2xl overflow-hidden shrink-0">
                        <img src="{{ $movie['poster'] }}" class="w-full h-full object-cover">
                    </div>
                    <div class="flex flex-col justify-between py-1 flex-1 min-w-0">
                        <div>
                            <h3 class="font-black text-slate-900 truncate">{{ $movie['name'] }}</h3>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter">{{ $movie['genre'] }} • {{ $movie['views'] }} views</p>
                        </div>
                        <div class="flex gap-2">
                            <button class="flex-1 py-2 bg-slate-900 text-white rounded-xl text-[10px] font-black uppercase tracking-widest">Edit</button>
                            <button @click="deleteModal = true; activeMovie = '{{ $movie['name'] }}'" class="px-3 bg-rose-50 text-rose-500 rounded-xl">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Desktop View: Table (Hidden on Mobile) --}}
        <div class="hidden lg:block bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100">
                        <th class="p-6 w-10">
                            <input type="checkbox" @click="toggleAll()" :checked="selectedItems.length === allNames.length" class="w-5 h-5 rounded border-slate-300 text-emerald-500 focus:ring-emerald-500/20">
                        </th>
                        <th class="py-5 px-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Movie Detail</th>
                        <th class="py-5 px-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Genre</th>
                        <th class="py-5 px-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Views</th>
                        <th class="py-5 px-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Status</th>
                        <th class="py-5 px-4 text-right"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach($recentMedia as $movie)
                        <tr class="group hover:bg-slate-50/50 transition-colors" :class="selectedItems.includes('{{ $movie['name'] }}') ? 'bg-emerald-50/30' : ''">
                            <td class="p-6">
                                <input type="checkbox" value="{{ $movie['name'] }}" x-model="selectedItems" class="w-5 h-5 rounded border-slate-300 text-emerald-500 focus:ring-emerald-500/20">
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex items-center gap-4">
                                    <img src="{{ $movie['poster'] }}" class="w-12 h-16 rounded-xl object-cover shadow-sm">
                                    <div>
                                        <p class="font-black text-slate-900 group-hover:text-emerald-600 transition-colors">{{ $movie['name'] }}</p>
                                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">SKU: {{ rand(1000, 9999) }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <span class="text-xs font-bold text-slate-600">{{ $movie['genre'] }}</span>
                            </td>
                            <td class="py-4 px-4">
                                <span class="text-xs font-black text-slate-900">{{ $movie['views'] }}</span>
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full {{ $movie['status'] == 'Published' ? 'bg-emerald-500' : 'bg-amber-400 animate-pulse' }}"></span>
                                    <span class="text-[10px] font-black uppercase tracking-widest text-slate-700">{{ $movie['status'] }}</span>
                                </div>
                            </td>
                            <td class="py-4 px-6 text-right">
                                <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button class="p-2 bg-white border border-slate-100 rounded-xl text-slate-400 hover:text-emerald-600 shadow-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2.5" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg></button>
                                    <button @click="deleteModal = true; activeMovie = '{{ $movie['name'] }}'" class="p-2 bg-white border border-slate-100 rounded-xl text-slate-400 hover:text-rose-600 shadow-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg></button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Global Delete Modal --}}
        <div x-show="deleteModal" class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm" x-cloak>
            <div @click.away="deleteModal = false" class="bg-white w-full max-w-sm rounded-[2.5rem] p-8 shadow-2xl overflow-hidden relative">
                <div class="text-center">
                    <div class="w-16 h-16 bg-rose-50 text-rose-500 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                    </div>
                    <h3 class="text-xl font-black text-slate-900 mb-2">Confirm Delete</h3>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-6" x-text="activeMovie"></p>
                    <div class="flex flex-col gap-2">
                        <button @click="deleteModal = false" class="w-full py-4 bg-rose-500 text-white rounded-2xl font-black text-xs uppercase tracking-widest shadow-lg shadow-rose-100">Confirm Deletion</button>
                        <button @click="deleteModal = false" class="w-full py-4 bg-slate-50 text-slate-400 rounded-2xl font-black text-xs uppercase tracking-widest">Nevermind</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
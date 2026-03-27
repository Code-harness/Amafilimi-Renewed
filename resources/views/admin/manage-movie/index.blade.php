@extends('layouts.admin')

@section('title', 'Manage Movies')

@section('content')
    <div class="space-y-6" x-data="{ 
            deleteModal: false, 
            activeMovieName: '', 
            activeMovieId: '',
            selectedItems: [],
            {{-- Map titles from the content relationship for Alpine selection --}}
            allNames: @json($movies->map(fn($m) => $m->content->title ?? 'Untitled')->toArray()),
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
                    <input type="text" placeholder="Quick find..."
                        class="w-full bg-slate-50 border-none rounded-2xl px-11 py-3 text-sm font-bold focus:ring-2 focus:ring-emerald-500/20">
                    <svg class="w-4 h-4 absolute left-4 top-1/2 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="3" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>

                <div x-show="selectedItems.length > 0" x-transition class="flex items-center gap-1 bg-slate-900 text-white p-1.5 rounded-xl">
                    <span class="text-[10px] font-black uppercase px-3" x-text="selectedItems.length"></span>
                    <button @click="deleteModal = true; activeMovieName = selectedItems.length + ' selected items'"
                        class="p-2 bg-rose-500 rounded-lg hover:bg-rose-600 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="flex items-center gap-2">
                <a href="{{ route('movies.create') }}"
                    class="flex-1 lg:flex-none px-6 py-3 bg-emerald-500 text-white rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-emerald-600 shadow-lg shadow-emerald-100">
                    Add Movie
                </a>
            </div>
        </div>

        {{-- Mobile View: Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 lg:hidden">
            @foreach($movies as $movie)
                @php $c = $movie->content; @endphp
                <div class="bg-white p-4 rounded-3xl border border-slate-100 shadow-sm flex gap-4 relative"
                    :class="selectedItems.includes('{{ $c->title ?? 'Untitled' }}') ? 'ring-2 ring-emerald-500' : ''">

                    <input type="checkbox" value="{{ $c->title ?? 'Untitled' }}" x-model="selectedItems"
                        class="absolute top-2 left-2 z-10 rounded text-emerald-500">

                    <div class="w-20 h-28 bg-slate-100 rounded-2xl overflow-hidden shrink-0">
                        <img src="{{ $c->thumbnail_url ?? 'https://via.placeholder.com/300x450?text=No+Poster' }}" 
                             alt="{{ $c->title ?? 'Movie' }}" class="w-full h-full object-cover">
                    </div>

                    <div class="flex flex-col justify-between py-1 flex-1 min-w-0">
                        <div>
                            <h3 class="font-black text-slate-900 truncate">{{ $c->title ?? 'Untitled' }}</h3>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter">
                                {{ $c->genre ?? 'General' }} • {{ $movie->views ?? 0 }} views
                            </p>
                        </div>
                        <div class="flex gap-2">
                            <a href="{{ route('movies.create', ['slug' => $c->slug ?? '']) }}"
                                class="flex-1 py-2 bg-slate-900 text-white rounded-xl text-[10px] font-black uppercase tracking-widest text-center">Edit</a>

                            <button @click="deleteModal = true; activeMovieName = '{{ addslashes($c->title ?? 'Untitled') }}'; activeMovieId = '{{ $movie->id }}'"
                                class="px-3 bg-rose-50 text-rose-500 rounded-xl">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Desktop View: Table --}}
        <div class="hidden lg:block bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100">
                        <th class="p-6 w-10">
                            <input type="checkbox" @click="toggleAll()" :checked="selectedItems.length === allNames.length && allNames.length > 0"
                                class="w-5 h-5 rounded border-slate-300 text-emerald-500 focus:ring-emerald-500/20">
                        </th>
                        <th class="py-5 px-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Movie Detail</th>
                        <th class="py-5 px-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Genre</th>
                        <th class="py-5 px-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Views</th>
                        <th class="py-5 px-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Status</th>
                        <th class="py-5 px-4 text-right"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach($movies as $movie)
                        @php $c = $movie->content; @endphp
                        <tr class="group hover:bg-slate-50/50 transition-colors"
                            :class="selectedItems.includes('{{ $c->title ?? 'Untitled' }}') ? 'bg-emerald-50/30' : ''">
                            <td class="p-6">
                                <input type="checkbox" value="{{ $c->title ?? 'Untitled' }}" x-model="selectedItems"
                                    class="w-5 h-5 rounded border-slate-300 text-emerald-500 focus:ring-emerald-500/20">
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex items-center gap-4">
                                    <img src="{{ $c->thumbnail_url ?? 'https://via.placeholder.com/150x200?text=No+Poster' }}"
                                        class="w-12 h-16 rounded-xl object-cover shadow-sm">
                                    <div>
                                        <p class="font-black text-slate-900 group-hover:text-emerald-600 transition-colors">
                                            {{ $c->title ?? 'Untitled' }}
                                        </p>
                                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">ID: {{ $movie->id }} • Slug: {{ $c->slug ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <span class="text-xs font-bold text-slate-600">{{ $c->genre ?? 'General' }}</span>
                            </td>
                            <td class="py-4 px-4">
                                <span class="text-xs font-black text-slate-900">{{ number_format($movie->views ?? 0) }}</span>
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full {{ strtolower($c->status ?? '') == 'published' ? 'bg-emerald-500' : 'bg-amber-400 animate-pulse' }}"></span>
                                    <span class="text-[10px] font-black uppercase tracking-widest text-slate-700">{{ $c->status ?? 'Draft' }}</span>
                                </div>
                            </td>
                            <td class="py-4 px-6 text-right">
                                <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <a href="{{ route('movies.create', ['slug' => $c->slug ?? '']) }}"
                                        class="p-2 bg-white border border-slate-100 rounded-xl text-slate-400 hover:text-emerald-600 shadow-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-width="2.5" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </a>
                                    <button @click="deleteModal = true; activeMovieName = '{{ addslashes($c->title ?? 'Untitled') }}'; activeMovieId = '{{ $movie->id }}'"
                                        class="p-2 bg-white border border-slate-100 rounded-xl text-slate-400 hover:text-rose-600 shadow-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Pagination --}}
            <div class="p-6 border-t border-slate-50">
                {{ $movies->links() }}
            </div>
        </div>

        {{-- Delete Confirmation Modal --}}
        <div x-show="deleteModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm" x-cloak>
            <div @click.away="deleteModal = false" class="bg-white rounded-[2rem] max-w-sm w-full p-8 shadow-2xl">
                <div class="w-16 h-16 bg-rose-50 text-rose-500 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </div>
                <h3 class="text-center font-black text-slate-900 text-xl mb-2">Are you sure?</h3>
                <p class="text-center text-slate-500 text-sm mb-8">You are about to delete <span class="font-bold text-slate-900" x-text="activeMovieName"></span>. This action cannot be undone.</p>
                <div class="flex gap-3">
                    <button @click="deleteModal = false" class="flex-1 py-3 rounded-xl font-bold text-slate-500 bg-slate-50 hover:bg-slate-100 transition-colors">Cancel</button>
                    <form :action="'/admin/movies/delete/' + activeMovieId" method="POST" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full py-3 rounded-xl font-bold text-white bg-rose-500 hover:bg-rose-600 shadow-lg shadow-rose-100 transition-colors">Delete</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
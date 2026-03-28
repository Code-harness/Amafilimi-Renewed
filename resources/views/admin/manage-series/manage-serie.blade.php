@extends('layouts.admin')

@section('title', 'Manage Series')

@section('content')
    <div class="space-y-6">
        {{-- Header --}}
        <div class="bg-white p-6 rounded-[2.5rem] border border-slate-100 shadow-sm">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                <div class="flex items-center gap-5">
                    <img src="{{ $series->content->thumbnail_url ?? asset('images/placeholder.jpg') }}"
                        class="w-24 h-32 rounded-2xl object-cover shadow-md">

                    <div>
                        <p class="text-[10px] font-black text-emerald-500 uppercase tracking-[0.2em]">Manage Series</p>
                        <h1 class="text-3xl font-black text-slate-900 mt-1">{{ $series->content->title }}</h1>
                        <p class="text-sm text-slate-500 mt-2">
                            {{ $series->content->genre ?? 'Unknown Genre' }} • {{ $series->content->status }}
                        </p>
                    </div>
                </div>

                <div class="flex gap-3">
                    <a href="{{ route('#') }}"
                        class="px-5 py-3 border border-slate-200 rounded-2xl font-black text-[10px] uppercase tracking-widest text-slate-600 hover:bg-slate-100 transition-all">
                        Back
                    </a>

                    <a href="{{ route('#', $series->id) }}"
                        class="px-5 py-3 bg-slate-900 text-white rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-emerald-600 transition-all">
                        Edit Series
                    </a>
                </div>
            </div>
        </div>

        {{-- Add Season Form --}}
        <div class="bg-white p-6 rounded-[2.5rem] border border-slate-100 shadow-sm">
            <div class="mb-6">
                <h2 class="text-xl font-black text-slate-900">Add New Season</h2>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">
                    Create a season for this series
                </p>
            </div>

            <form action="#" method="POST" class="grid md:grid-cols-2 gap-5">
                @csrf

                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Season Number</label>
                    <input type="number" name="number" min="1" required
                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    @error('number')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Season Title</label>
                    <input type="text" name="title"
                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Release Year</label>
                    <input type="number" name="release_year" min="1900" max="{{ date('Y') + 1 }}"
                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Description</label>
                    <textarea name="description" rows="4"
                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none"></textarea>
                </div>

                <div class="md:col-span-2">
                    <button type="submit"
                        class="px-6 py-3 bg-emerald-500 text-white rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-emerald-600 transition-all shadow-lg shadow-emerald-100">
                        Add Season
                    </button>
                </div>
            </form>
        </div>

        {{-- Seasons List --}}
        <div class="bg-white p-6 rounded-[2.5rem] border border-slate-100 shadow-sm">
            <div class="mb-6">
                <h2 class="text-xl font-black text-slate-900">Seasons</h2>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">
                    Manage all seasons under this series
                </p>
            </div>

            <div class="space-y-4">
                @forelse($series->seasons as $season)
                    <div class="border border-slate-100 rounded-[2rem] p-5 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5 hover:shadow-md transition-all">
                        <div>
                            <h3 class="text-lg font-black text-slate-900">
                                Season {{ $season->number }}
                                @if($season->title)
                                    <span class="text-slate-500">• {{ $season->title }}</span>
                                @endif
                            </h3>

                            <p class="text-sm text-slate-500 mt-2">
                                {{ $season->episodes->count() }} Episodes
                                @if($season->release_year)
                                    • {{ $season->release_year }}
                                @endif
                            </p>

                            @if($season->description)
                                <p class="text-sm text-slate-400 mt-2 max-w-2xl">
                                    {{ $season->description }}
                                </p>
                            @endif
                        </div>

                        <div class="flex flex-wrap gap-3">
                            <a href="{{ route('seasons.episodes.index', $season->id) }}"
                                class="px-5 py-3 bg-slate-900 text-white rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-emerald-600 transition-all">
                                Manage Episodes
                            </a>

                            <a href="{{ route('#', $season->id) }}"
                                class="px-5 py-3 border border-slate-200 rounded-2xl font-black text-[10px] uppercase tracking-widest text-slate-600 hover:bg-slate-100 transition-all">
                                Edit
                            </a>

                            <form action="{{ route('series.seasons.destroy', [$series->id, $season->id]) }}" method="POST"
                                onsubmit="return confirm('Delete this season and all its episodes?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="px-5 py-3 bg-red-50 text-red-600 border border-red-100 rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-red-100 transition-all">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-10 border border-dashed border-slate-200 rounded-[2rem]">
                        <p class="text-sm font-bold text-slate-500">No seasons added yet.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
@extends('layouts.admin')

@section('title', 'Manage Episodes')

@section('content')
    <div class="space-y-6">
        {{-- Header --}}
        <div class="bg-white p-6 rounded-[2.5rem] border border-slate-100 shadow-sm">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                <div>
                    <p class="text-[10px] font-black text-emerald-500 uppercase tracking-[0.2em]">Manage Episodes</p>
                    <h1 class="text-3xl font-black text-slate-900 mt-1">
                        {{ $season->series->content->title ?? 'Series' }} — Season {{ $season->number }}
                    </h1>
                    <p class="text-sm text-slate-500 mt-2">
                        {{ $season->episodes->count() }} Episodes
                    </p>
                </div>

                <a href="{{ route('admin.series.manage', $season->series_id) }}"
                    class="px-5 py-3 border border-slate-200 rounded-2xl font-black text-[10px] uppercase tracking-widest text-slate-600 hover:bg-slate-100 transition-all">
                    Back to Series
                </a>
            </div>
        </div>

        {{-- Add Episode Form --}}
        <div class="bg-white p-6 rounded-[2.5rem] border border-slate-100 shadow-sm">
            <div class="mb-6">
                <h2 class="text-xl font-black text-slate-900">Add New Episode</h2>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">
                    Add an episode directly to this season
                </p>
            </div>

            <form action="{{ route('admin.seasons.episodes.store', $season->id) }}" method="POST"
                class="grid md:grid-cols-2 gap-5">
                @csrf

                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Episode
                        Number</label>
                    <input type="number" name="episode_number" min="1" required
                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    @error('episode_number')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Episode
                        Title</label>
                    <input type="text" name="title" required
                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Embed
                        URL</label>
                    <input type="url" name="embed_url" required
                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <div>
                    <label
                        class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Duration</label>
                    <input type="text" name="duration" placeholder="e.g 45 min"
                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Release
                        Year</label>
                    <input type="number" name="release_year" min="1900" max="{{ date('Y') + 1 }}"
                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <div>
                    <label
                        class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Language</label>
                    <input type="text" name="language"
                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <div class="md:col-span-2">
                    <label
                        class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Synopsis</label>
                    <textarea name="synopsis" rows="4"
                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none"></textarea>
                </div>

                <div class="md:col-span-2">
                    <button type="submit"
                        class="px-6 py-3 bg-emerald-500 text-white rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-emerald-600 transition-all shadow-lg shadow-emerald-100">
                        Add Episode
                    </button>
                </div>
            </form>
        </div>

        {{-- Episodes List --}}
        <div class="bg-white p-6 rounded-[2.5rem] border border-slate-100 shadow-sm">
            <div class="mb-6">
                <h2 class="text-xl font-black text-slate-900">Episodes</h2>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">
                    Manage all episodes under this season
                </p>
            </div>

            <div class="space-y-4">
                @forelse($season->episodes as $episode)
                    <div
                        class="border border-slate-100 rounded-[2rem] p-5 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5 hover:shadow-md transition-all">
                        <div>
                            <h3 class="text-lg font-black text-slate-900">
                                Episode {{ $episode->episode_number }} — {{ $episode->title }}
                            </h3>

                            <p class="text-sm text-slate-500 mt-2">
                                {{ $episode->duration ?? 'No duration' }}
                                @if($episode->release_year)
                                    • {{ $episode->release_year }}
                                @endif
                                @if($episode->language)
                                    • {{ $episode->language }}
                                @endif
                            </p>

                            @if($episode->synopsis)
                                <p class="text-sm text-slate-400 mt-2 max-w-2xl">
                                    {{ $episode->synopsis }}
                                </p>
                            @endif
                        </div>

                        <div class="flex flex-wrap gap-3">
                            <a href="{{ route('episodes.edit', $episode->id) }}"
                                class="px-5 py-3 border border-slate-200 rounded-2xl font-black text-[10px] uppercase tracking-widest text-slate-600 hover:bg-slate-100 transition-all">
                                Edit
                            </a>

                            <form action="{{ route('admin.seasons.episodes.destroy', [$season->id, $episode->id]) }}"
                                method="POST" onsubmit="return confirm('Delete this episode?')">
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
                        <p class="text-sm font-bold text-slate-500">No episodes added yet.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
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
                        {{ $season->serie->content->title ?? 'Series' }} — Season {{ $season->season_number }}
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

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="bg-red-50 border border-red-100 text-red-600 p-5 rounded-2xl">
                <p class="font-black text-sm mb-2">Please fix the following:</p>
                <ul class="list-disc pl-5 text-sm space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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

                {{-- Episode Number --}}
                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">
                        Episode Number
                    </label>
                    <input type="number" name="episode_number" min="1" required value="{{ old('episode_number') }}"
                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    @error('episode_number')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Episode Title --}}
                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">
                        Episode Title
                    </label>
                    <input type="text" name="title" required value="{{ old('title') }}"
                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Description --}}
                <div class="md:col-span-2">
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">
                        Description
                    </label>
                    <textarea name="description" rows="4"
                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Thumbnail URL --}}
                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">
                        Thumbnail URL
                    </label>
                    <input type="url" name="thumbnail_url" required value="{{ old('thumbnail_url') }}"
                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    @error('thumbnail_url')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Embed URL --}}
                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">
                        Embed URL
                    </label>
                    <input type="url" name="embed_url" required value="{{ old('embed_url') }}"
                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    @error('embed_url')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Duration --}}
                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">
                        Duration (Minutes)
                    </label>
                    <input type="number" name="duration" min="1" value="{{ old('duration') }}"
                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    @error('duration')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Release Year --}}
                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">
                        Release Year
                    </label>
                    <input type="number" name="release_year" min="1900" max="{{ date('Y') + 1 }}"
                        value="{{ old('release_year') }}"
                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    @error('release_year')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Language --}}
                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">
                        Language
                    </label>
                    <input type="text" name="language" value="{{ old('language') }}"
                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    @error('language')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Visibility --}}
                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">
                        Visibility
                    </label>
                    <select name="visibility"
                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        <option value="public" {{ old('visibility') == 'public' ? 'selected' : '' }}>Public</option>
                        <option value="private" {{ old('visibility') == 'private' ? 'selected' : '' }}>Private</option>
                        <option value="premium" {{ old('visibility') == 'premium' ? 'selected' : '' }}>Premium</option>
                    </select>
                    @error('visibility')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Status --}}
                <div>
                    <label class="block text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">
                        Status
                    </label>
                    <select name="status"
                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                        <option value="scheduled" {{ old('status') == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                    </select>
                    @error('status')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Flags --}}
                <div class="md:col-span-2 flex flex-wrap items-center gap-6">
                    <label class="inline-flex items-center gap-2">
                        <input type="checkbox" name="is_featured" value="1"
                            {{ old('is_featured') ? 'checked' : '' }}
                            class="rounded border-slate-300 text-emerald-500 focus:ring-emerald-500">
                        <span class="text-sm text-slate-600 font-medium">Featured</span>
                    </label>

                    <label class="inline-flex items-center gap-2">
                        <input type="checkbox" name="is_free" value="1"
                            {{ old('is_free') ? 'checked' : '' }}
                            class="rounded border-slate-300 text-emerald-500 focus:ring-emerald-500">
                        <span class="text-sm text-slate-600 font-medium">Free to Watch</span>
                    </label>
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
                                Episode {{ $episode->episode_number }} — {{ $episode->content->title ?? 'Untitled Episode' }}
                            </h3>

                            <p class="text-sm text-slate-500 mt-2">
                                {{ $episode->duration ? $episode->duration . ' mins' : 'No duration' }}
                                @if($episode->release_year)
                                    • {{ $episode->release_year }}
                                @endif
                                @if($episode->language)
                                    • {{ $episode->language }}
                                @endif
                            </p>

                            @if($episode->content?->description)
                                <p class="text-sm text-slate-400 mt-2 max-w-2xl">
                                    {{ $episode->content->description }}
                                </p>
                            @endif
                        </div>

                        <div class="flex flex-wrap gap-3">
                            {{-- Add edit later --}}
                            {{-- <a href="{{ route('episodes.edit', $episode->id) }}"
                                class="px-5 py-3 border border-slate-200 rounded-2xl font-black text-[10px] uppercase tracking-widest text-slate-600 hover:bg-slate-100 transition-all">
                                Edit
                            </a> --}}

                            <form action="#"
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
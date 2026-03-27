@extends('layouts.admin')

@section('title', 'Amafilimi | Create Series')

@section('content')
    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
        <div>
            <div class="flex items-center gap-3">
                <h1 class="text-4xl font-black text-slate-900 tracking-tight">Create Series</h1>
                <span
                    class="px-3 py-1 bg-indigo-50 text-indigo-600 text-[10px] font-black uppercase tracking-widest rounded-full border border-indigo-100 flex items-center gap-1.5">
                    <span class="w-1.5 h-1.5 bg-indigo-500 rounded-full animate-pulse"></span>
                    New Series
                </span>
            </div>
            <p class="text-slate-500 mt-2 font-medium text-lg">
                Add a new series and prepare it for seasons and episodes.
            </p>
        </div>

        <div class="flex gap-3">
            <a href="#"
                class="px-6 py-3.5 bg-white border border-slate-200 rounded-2xl font-bold text-slate-600 hover:bg-slate-50 transition-all flex items-center gap-2 text-sm shadow-sm">
                Back to Series
            </a>
        </div>
    </div>

    <form action="{{ route('series.create') }}" method="POST" class="space-y-8">
        @csrf

        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
            {{-- Left Main Form --}}
            <div class="xl:col-span-2 space-y-8">

                {{-- Series Information --}}
                <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
                    <div class="p-8 border-b border-slate-50">
                        <h3 class="font-black text-slate-900 text-xl tracking-tight">Series Information</h3>
                        <p class="text-sm text-slate-500 mt-1">Basic information about the series.</p>
                    </div>

                    <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-3">Series Title *</label>
                            <input type="text" name="title" value="{{ old('title') }}"
                                class="w-full rounded-2xl border border-slate-200 px-5 py-4 text-sm font-semibold text-slate-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none"
                                placeholder="e.g. Prison Break">
                            @error('title') <p class="text-rose-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-3">Slug</label>
                            <input type="text" name="slug" value="{{ old('slug') }}"
                                class="w-full rounded-2xl border border-slate-200 px-5 py-4 text-sm font-semibold text-slate-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none"
                                placeholder="auto-generated if left empty">
                            @error('slug') <p class="text-rose-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-3">Release Year</label>
                            <input type="number" name="release_year" value="{{ old('release_year') }}"
                                class="w-full rounded-2xl border border-slate-200 px-5 py-4 text-sm font-semibold text-slate-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none"
                                placeholder="e.g. 2005">
                            @error('release_year') <p class="text-rose-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-3">Genre *</label>
                            <input type="text" name="genre" value="{{ old('genre') }}"
                                class="w-full rounded-2xl border border-slate-200 px-5 py-4 text-sm font-semibold text-slate-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none"
                                placeholder="e.g. Action, Thriller">
                            @error('genre') <p class="text-rose-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-3">Language</label>
                            <input type="text" name="language" value="{{ old('language') }}"
                                class="w-full rounded-2xl border border-slate-200 px-5 py-4 text-sm font-semibold text-slate-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none"
                                placeholder="e.g. English">
                            @error('language') <p class="text-rose-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-3">Description *</label>
                            <textarea name="description" rows="6"
                                class="w-full rounded-2xl border border-slate-200 px-5 py-4 text-sm font-semibold text-slate-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none"
                                placeholder="Write a short and compelling series description...">{{ old('description') }}</textarea>
                            @error('description') <p class="text-rose-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                {{-- Media Assets --}}
                <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
                    <div class="p-8 border-b border-slate-50">
                        <h3 class="font-black text-slate-900 text-xl tracking-tight">Media Assets</h3>
                        <p class="text-sm text-slate-500 mt-1">Series artwork and trailer links.</p>
                    </div>

                    <div class="p-8 grid grid-cols-1 gap-6">
                        <div>
                            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-3">Thumbnail URL *</label>
                            <input type="url" name="thumbnail_url" value="{{ old('thumbnail_url') }}"
                                class="w-full rounded-2xl border border-slate-200 px-5 py-4 text-sm font-semibold text-slate-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none"
                                placeholder="Cloudinary thumbnail URL">
                            @error('thumbnail_url') <p class="text-rose-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-3">Poster URL</label>
                            <input type="url" name="poster_url" value="{{ old('poster_url') }}"
                                class="w-full rounded-2xl border border-slate-200 px-5 py-4 text-sm font-semibold text-slate-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none"
                                placeholder="Optional poster URL">
                            @error('poster_url') <p class="text-rose-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-3">Trailer URL</label>
                            <input type="url" name="trailer_url" value="{{ old('trailer_url') }}"
                                class="w-full rounded-2xl border border-slate-200 px-5 py-4 text-sm font-semibold text-slate-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none"
                                placeholder="YouTube / Vimeo trailer URL">
                            @error('trailer_url') <p class="text-rose-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right Sidebar --}}
            <div class="space-y-8">

                {{-- Publishing Settings --}}
                <div class="bg-slate-900 rounded-[2.5rem] p-8 text-white shadow-2xl">
                    <h3 class="text-lg font-black tracking-tight mb-6">Publishing Settings</h3>

                    <div class="space-y-6">
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-3">Visibility *</label>
                            <select name="visibility"
                                class="w-full rounded-2xl border border-slate-700 bg-slate-800 px-5 py-4 text-sm font-bold text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none">
                                <option value="public" {{ old('visibility') == 'public' ? 'selected' : '' }}>Public</option>
                                <option value="private" {{ old('visibility') == 'private' ? 'selected' : '' }}>Private</option>
                                <option value="premium" {{ old('visibility') == 'premium' ? 'selected' : '' }}>Premium Only</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-3">Status *</label>
                            <select name="status"
                                class="w-full rounded-2xl border border-slate-700 bg-slate-800 px-5 py-4 text-sm font-bold text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none">
                                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                                <option value="scheduled" {{ old('status') == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-3">Featured</label>
                            <label class="flex items-center justify-between bg-slate-800 border border-slate-700 rounded-2xl px-5 py-4 cursor-pointer">
                                <span class="text-sm font-bold text-slate-200">Mark as Featured</span>
                                <input type="checkbox" name="is_featured" value="1"
                                    class="w-5 h-5 rounded border-slate-600 text-indigo-500 focus:ring-indigo-500"
                                    {{ old('is_featured') ? 'checked' : '' }}>
                            </label>
                        </div>

                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-3">Free Access</label>
                            <label class="flex items-center justify-between bg-slate-800 border border-slate-700 rounded-2xl px-5 py-4 cursor-pointer">
                                <span class="text-sm font-bold text-slate-200">Available Without Subscription</span>
                                <input type="checkbox" name="is_free" value="1"
                                    class="w-5 h-5 rounded border-slate-600 text-indigo-500 focus:ring-indigo-500"
                                    {{ old('is_free') ? 'checked' : '' }}>
                            </label>
                        </div>
                    </div>
                </div>

                {{-- Save Card --}}
                <div class="bg-indigo-500 rounded-[2.5rem] p-8 text-white">
                    <p class="text-xs font-black uppercase tracking-widest opacity-80 mb-2">Ready to Save</p>
                    <p class="text-3xl font-black mb-4">New Series</p>
                    <p class="text-sm text-indigo-50/90 mb-6 leading-relaxed">
                        Save this series and continue by adding seasons and episodes.
                    </p>

                    <button type="submit"
                        class="w-full py-4 bg-white text-indigo-600 rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-indigo-50 transition-colors shadow-lg">
                        Create Series
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection
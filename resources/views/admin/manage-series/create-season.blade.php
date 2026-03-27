@extends('layouts.admin')

@section('title', 'Amafilimi | Create Season')

@section('content')
    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
        <div>
            <div class="flex items-center gap-3">
                <h1 class="text-4xl font-black text-slate-900 tracking-tight">Create Season</h1>
                <span
                    class="px-3 py-1 bg-amber-50 text-amber-600 text-[10px] font-black uppercase tracking-widest rounded-full border border-amber-100 flex items-center gap-1.5">
                    <span class="w-1.5 h-1.5 bg-amber-500 rounded-full animate-pulse"></span>
                    New Season
                </span>
            </div>
            <p class="text-slate-500 mt-2 font-medium text-lg">
                Add a new season to an existing series.
            </p>
        </div>

        <div class="flex gap-3">
            {{-- Updated to point back to the series index --}}
            <a href="{{ route('series.index') }}"
                class="px-6 py-3.5 bg-white border border-slate-200 rounded-2xl font-bold text-slate-600 hover:bg-slate-50 transition-all flex items-center gap-2 text-sm shadow-sm">
                Back to Library
            </a>
        </div>
    </div>

    {{-- 
        Form Action: Points to season.store 
        Success/Error messages are handled by @error and standard session flash
    --}}
    <form action="{{ route('seasons.store') }}" method="POST" class="space-y-8">
        @csrf

        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
            {{-- Left Main Form --}}
            <div class="xl:col-span-2 space-y-8">

                {{-- Season Information --}}
                <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
                    <div class="p-8 border-b border-slate-50">
                        <h3 class="font-black text-slate-900 text-xl tracking-tight">Season Information</h3>
                        <p class="text-sm text-slate-500 mt-1">Assign this season to a series and define its order.</p>
                    </div>

                    <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Series Select --}}
                        <div class="md:col-span-2">
                            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-3">
                                Series *
                            </label>
                            <select name="series_id" required
                                class="w-full rounded-2xl border border-slate-200 px-5 py-4 bg-white text-sm font-semibold text-slate-700 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none @error('series_id') border-rose-500 @enderror">
                                <option value="">Select series</option>
                                @foreach($series as $item)
                                    {{-- Accessing title via content relationship as per your controller --}}
                                    <option value="{{ $item->id }}" {{ old('series_id', request('series_id')) == $item->id ? 'selected' : '' }}>
                                        {{ $item->content->title ?? 'Untitled Series' }}
                                    </option>
                                @endforeach
                            </select>
                            @error('series_id') <p class="text-rose-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
                        </div>

                        {{-- Season Number --}}
                        <div>
                            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-3">
                                Season Number *
                            </label>
                            <input type="number" name="season_number" value="{{ old('season_number') }}" required
                                class="w-full rounded-2xl border border-slate-200 px-5 py-4 text-sm font-semibold text-slate-700 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none @error('season_number') border-rose-500 @enderror"
                                placeholder="e.g. 1">
                            @error('season_number') <p class="text-rose-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
                        </div>

                        {{-- Season Title --}}
                        <div>
                            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-3">
                                Season Title
                            </label>
                            <input type="text" name="title" value="{{ old('title') }}"
                                class="w-full rounded-2xl border border-slate-200 px-5 py-4 text-sm font-semibold text-slate-700 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none"
                                placeholder="e.g. Season 1 (Optional)">
                            @error('title') <p class="text-rose-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
                        </div>

                        {{-- Thumbnail --}}
                        <div class="md:col-span-2">
                            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-3">
                                Thumbnail URL
                            </label>
                            <input type="url" name="thumbnail_url" value="{{ old('thumbnail_url') }}"
                                class="w-full rounded-2xl border border-slate-200 px-5 py-4 text-sm font-semibold text-slate-700 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none"
                                placeholder="https://res.cloudinary.com/...">
                            @error('thumbnail_url') <p class="text-rose-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
                        </div>

                        {{-- Description --}}
                        <div class="md:col-span-2">
                            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-3">
                                Description
                            </label>
                            <textarea name="description" rows="5"
                                class="w-full rounded-2xl border border-slate-200 px-5 py-4 text-sm font-semibold text-slate-700 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none"
                                placeholder="Optional short description for this season...">{{ old('description') }}</textarea>
                            @error('description') <p class="text-rose-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
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
                            <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-3">
                                Status *
                            </label>
                            <select name="status" required
                                class="w-full rounded-2xl border border-slate-700 bg-slate-800 px-5 py-4 text-sm font-bold text-white focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none">
                                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                            </select>
                            @error('status') <p class="text-rose-400 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                {{-- Save Card --}}
                <div class="bg-amber-500 rounded-[2.5rem] p-8 text-white shadow-lg shadow-amber-100">
                    <p class="text-xs font-black uppercase tracking-widest opacity-80 mb-2">Ready to Save</p>
                    <p class="text-3xl font-black mb-4">Finalize</p>
                    <p class="text-sm text-amber-50/90 mb-6 leading-relaxed">
                        Once created, you can start uploading episodes to this season.
                    </p>

                    <button type="submit"
                        class="w-full py-4 bg-white text-amber-600 rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-amber-50 transition-all active:scale-95 shadow-xl shadow-amber-600/20">
                        Create Season
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection
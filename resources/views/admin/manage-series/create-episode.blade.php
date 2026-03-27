@extends('layouts.admin')

@section('title', 'Amafilimi | Add Episode')

@section('content')
    <div class="max-w-6xl mx-auto p-6">
        <h1 class="text-3xl font-black text-slate-900 mb-4">Add Episode</h1>
        <p class="text-slate-500 mb-8">
            Adding a new episode to <strong>{{ $season->series_title }} - {{ $season->title }}</strong>
        </p>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Left: Episode Info --}}
            <div class="lg:col-span-2 bg-white p-8 rounded-2xl shadow-sm">
                <form action="{{ route('admin.episodes.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="season_id" value="{{ $season->id }}">

                    <div class="mb-4">
                        <label class="block font-bold mb-1">Episode Content *</label>
                        <select name="content_id" required class="w-full border border-slate-200 rounded-xl p-3">
                            @foreach($contents as $content)
                                <option value="{{ $content->id }}">{{ $content->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold mb-1">Episode Number *</label>
                        <input type="number" name="episode_number" class="w-full border border-slate-200 rounded-xl p-3"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold mb-1">Embed URL *</label>
                        <input type="url" name="embed_url" class="w-full border border-slate-200 rounded-xl p-3" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold mb-1">Duration (minutes)</label>
                        <input type="number" name="duration" class="w-full border border-slate-200 rounded-xl p-3">
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold mb-1">Release Year</label>
                        <input type="number" name="release_year" class="w-full border border-slate-200 rounded-xl p-3">
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold mb-1">Language</label>
                        <input type="text" name="language" class="w-full border border-slate-200 rounded-xl p-3">
                    </div>

                    {{-- Status Select --}}
                    <div class="mb-4">
                        <label class="block font-bold mb-1">Status *</label>
                        <select name="status" class="w-full border border-slate-200 rounded-xl p-3">
                            <option value="draft" selected>Draft</option>
                            <option value="published">Published</option>
                        </select>
                    </div>

                    <button type="submit"
                        class="w-full py-4 bg-emerald-500 text-white rounded-2xl font-black text-sm uppercase tracking-widest hover:bg-emerald-600 transition-all">
                        Add Episode
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
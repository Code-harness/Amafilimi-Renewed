@extends('layouts.admin')

@section('title', 'Amafilimi | Add Episode')

@php
    // Mock season data (passed as parameter normally)
    $season = (object) [
        'id' => 5,
        'title' => 'Season One',
        'series_title' => 'Mystery Manor',
    ];

    // Mock episode old input / defaults
    $old = [
        'title' => 'Episode 1 - The Arrival',
        'episode_number' => 1,
        'video_url' => 'https://embed.bunny.net/video123',
        'thumbnail_url' => 'https://via.placeholder.com/300x180?text=Episode+1+Thumbnail',
        'description' => 'The first episode introduces our main characters and the mysterious manor.',
        'status' => 'draft',
    ];
@endphp

@section('content')
    <div class="max-w-6xl mx-auto p-6">
        <h1 class="text-3xl font-black text-slate-900 mb-4">Add Episode</h1>
        <p class="text-slate-500 mb-8">Adding a new episode to <strong>{{ $season->series_title }} -
                {{ $season->title }}</strong></p>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Left: Episode Info --}}
            <div class="lg:col-span-2 bg-white p-8 rounded-2xl shadow-sm">
                <form action="#" method="POST">
                    @csrf
                    <input type="hidden" name="season_id" value="{{ $season->id }}">

                    <div class="mb-4">
                        <label class="block text-sm font-bold text-slate-700 mb-1">Episode Number *</label>
                        <input type="number" name="episode_number" value="{{ $old['episode_number'] }}"
                            class="w-full border border-slate-200 rounded-xl p-3" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-bold text-slate-700 mb-1">Episode Title *</label>
                        <input type="text" name="title" value="{{ $old['title'] }}"
                            class="w-full border border-slate-200 rounded-xl p-3" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-bold text-slate-700 mb-1">Video URL *</label>
                        <input type="url" name="video_url" value="{{ $old['video_url'] }}"
                            class="w-full border border-slate-200 rounded-xl p-3" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-bold text-slate-700 mb-1">Thumbnail URL</label>
                        <input type="url" name="thumbnail_url" value="{{ $old['thumbnail_url'] }}"
                            class="w-full border border-slate-200 rounded-xl p-3">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-bold text-slate-700 mb-1">Description</label>
                        <textarea name="description" rows="4"
                            class="w-full border border-slate-200 rounded-xl p-3">{{ $old['description'] }}</textarea>
                    </div>
                </form>
            </div>

            {{-- Right: Publishing & Save --}}
            <div class="space-y-6">
                <div class="bg-white p-8 rounded-2xl shadow-sm">
                    <div class="mb-4">
                        <label class="block text-sm font-bold text-slate-700 mb-1">Status *</label>
                        <select name="status" class="w-full border border-slate-200 rounded-xl p-3">
                            <option value="draft" {{ $old['status'] == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ $old['status'] == 'published' ? 'selected' : '' }}>Published</option>
                        </select>
                    </div>

                    <button type="submit"
                        class="w-full py-4 bg-emerald-500 text-white rounded-2xl font-black text-sm uppercase tracking-widest hover:bg-emerald-600 transition-all">
                        Add Episode
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
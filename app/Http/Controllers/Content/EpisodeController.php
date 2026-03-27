<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Episodes;
use App\Models\Season;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    /**
     * Show form to create an episode
     */
    public function create($seasonId)
    {
        $season = Season::with('serie.content')->findOrFail($seasonId);

        // Load all contents for the dropdown
        $contents = Content::orderBy('title')->get();

        return view('admin.manage-series.create-episode', [
            'season' => (object)[
                'id' => $season->id,
                'title' => $season->title,
                'series_title' => $season->serie->title,
            ],
            'contents' => $contents,
            'old' => old() 
        ]);
    }

    /**
     * Store a new episode
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'season_id' => 'required|exists:seasons,id',
            'content_id' => 'required|unique:episodes,content_id',
            'episode_number' => 'required|integer|min:1',
            'embed_url' => 'required|url|max:2048',
            'duration' => 'nullable|integer|min:1',
            'release_year' => 'nullable|digits:4|integer',
            'language' => 'nullable|string|max:50',
        ]);

        Episodes::create($validated);

        return redirect()
            ->route('series.index', $request->season_id)
            ->with('success', 'Episode added successfully!');
    }
}

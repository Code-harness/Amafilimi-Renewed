<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Season;
use App\Models\Serie;

class SeasonController extends Controller
{
    /**
     * Show the form to create a new season.
     */
    public function create()
    {
        $series = Serie::with('content')->get();

        return view('admin.manage-series.create-season', compact('series'));
    }

    /**
     * Store a new season in the database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'series_id' => 'required|exists:series,id',
            'season_number' => 'required|integer|min:1',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'thumbnail_url' => 'nullable|url|max:1024',
            'status' => 'required|in:draft,published',
        ]);

        // Ensure unique season_number per series
        $exists = Season::where('series_id', $validated['series_id'])
            ->where('season_number', $validated['season_number'])
            ->exists();

        if ($exists) {
            return back()->withErrors([
                'season_number' => 'This season number already exists for the selected series.'
            ])->withInput();
        }

        // Create the season
        $season = Season::create($validated);

        return redirect()->route('series.index', $season->serie->id)
            ->with('success', 'Season created successfully!');
    }

    /**
     * Optional: show a season details page
     */
    public function show(Season $season)
    {
        $season->load('episodes', 'serie.content');
        return view('admin.seasons.show', compact('season'));
    }
}

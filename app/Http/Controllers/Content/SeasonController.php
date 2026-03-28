<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Season;
use App\Models\Serie;

class SeasonController extends Controller
{
    /**
     * Store a new season under a specific series.
     */
    public function store(Request $request, Serie $serie)
    {
        $validated = $request->validate([
            'season_number' => 'required|integer|min:1',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'thumbnail_url' => 'nullable|url|max:1024',
            'status' => 'required|in:draft,published',
        ]);

        // Ensure unique season number per series
        $exists = Season::where('series_id', $serie->id)
            ->where('season_number', $validated['season_number'])
            ->exists();

        if ($exists) {
            return back()->withErrors([
                'season_number' => 'This season number already exists for this series.'
            ])->withInput();
        }

        Season::create([
            'series_id' => $serie->id,
            'season_number' => $validated['season_number'],
            'title' => $validated['title'] ?? null,
            'description' => $validated['description'] ?? null,
            'thumbnail_url' => $validated['thumbnail_url'] ?? null,
            'status' => $validated['status'],
        ]);

        return redirect()->route('admin.series.manage', $serie->id)
            ->with('success', 'Season created successfully!');
    }

    /**
     * Show a specific season with its episodes.
     */
    public function show(Season $season)
    {
        $season->load('episodes', 'serie.content');

        return view('admin.seasons.show', compact('season'));
    }

    /**
     * Delete a season under a specific series.
     */
    public function destroy(Serie $serie, Season $season)
    {
        if ($season->series_id !== $serie->id) {
            abort(404);
        }

        $season->delete();

        return redirect()->route('admin.series.manage', $serie->id)
            ->with('success', 'Season deleted successfully!');
    }
}

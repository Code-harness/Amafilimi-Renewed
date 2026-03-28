<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Episodes;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EpisodeController extends Controller
{
    /**
     * Show all episodes for a specific season.
     */
    public function index(Season $season)
    {
        $season->load([
            'serie.content',
            'episodes.content'
        ]);

        return view('admin.manage-series.manage-episode', compact('season'));
    }

    /**
     * Store a new episode under a specific season.
     */
    public function store(Request $request, Season $season)
    {
        $validated = $request->validate([
            'episode_number' => 'required|integer|min:1',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail_url' => 'required|url|max:2048',
            'embed_url' => 'required|url|max:2048',
            'duration' => 'nullable|integer|min:1',
            'release_year' => 'nullable|digits:4|integer|min:1900|max:' . (date('Y') + 1),
            'language' => 'nullable|string|max:50',
            'visibility' => 'required|in:public,private,premium',
            'status' => 'required|in:draft,published,scheduled',
            'is_featured' => 'sometimes|boolean',
            'is_free' => 'sometimes|boolean',
        ]);

        // Prevent duplicate episode number in same season
        $exists = Episodes::where('season_id', $season->id)
            ->where('episode_number', $validated['episode_number'])
            ->exists();

        if ($exists) {
            return back()->withErrors([
                'episode_number' => 'This episode number already exists in this season.'
            ])->withInput();
        }

        // Create content record for this episode
        $content = Content::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']) . '-s' . $season->season_number . '-e' . $validated['episode_number'],
            'description' => $validated['description'] ?? null,
            'genre' => $season->serie->content->genre ?? 'Series Episode',
            'thumbnail_url' => $validated['thumbnail_url'],
            'poster_url' => null,
            'visibility' => $validated['visibility'],
            'status' => $validated['status'],
            'is_featured' => $request->has('is_featured'),
            'is_free' => $request->has('is_free'),
        ]);

        // Create episode linked to content
        Episodes::create([
            'season_id' => $season->id,
            'content_id' => $content->id,
            'episode_number' => $validated['episode_number'],
            'embed_url' => $validated['embed_url'],
            'duration' => $validated['duration'] ?? null,
            'release_year' => $validated['release_year'] ?? null,
            'language' => $validated['language'] ?? null,
        ]);

        return redirect()
            ->route('admin.seasons.episodes.index', $season->id)
            ->with('success', 'Episode added successfully!');
    }

    /**
     * Delete an episode from a season.
     */
    public function destroy(Season $season, Episodes $episode)
    {
        if ($episode->season_id !== $season->id) {
            abort(404);
        }

        // Delete related content first if it exists
        if ($episode->content) {
            $episode->content->delete();
        }

        $episode->delete();

        return redirect()
            ->route('admin.seasons.episodes.index', $season->id)
            ->with('success', 'Episode deleted successfully!');
    }
}
<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SerieController extends Controller
{
    /**
     * Display all series
     */
    public function index()
    {
        $seriesList = Serie::with([
            'content',
            'seasons.episodes'
        ])
            ->withCount('seasons')
            ->latest()
            ->paginate(10);

        // Add total episodes manually
        $seriesList->getCollection()->transform(function ($serie) {
            $serie->total_episodes = $serie->seasons->sum(fn($season) => $season->episodes->count());
            return $serie;
        });

        return view('admin.manage-series.index', compact('seriesList'));
    }

    /**
     * Show create series form
     */
    public function create()
    {
        return view('admin.manage-series.add-serie');
    }

    /**
     * Store a newly created series
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'slug'          => 'nullable|string|max:255|unique:contents,slug',
            'description'   => 'required|string',
            'genre'         => 'required|string|max:255',
            'thumbnail_url' => 'required|url|max:2048',
            'poster_url'    => 'nullable|url|max:2048',
            'trailer_url'   => 'nullable|url|max:2048',
            'release_year'  => 'nullable|digits:4|integer|min:1900|max:' . date('Y'),
            'language'      => 'nullable|string|max:50',
            'visibility'    => 'required|in:public,private,premium',
            'status'        => 'required|in:draft,published,scheduled',
            'is_featured'   => 'sometimes|boolean',
            'is_free'       => 'sometimes|boolean',
        ]);

        // Create shared content record
        $content = Content::create([
            'title'         => $request->title,
            'slug'          => $request->slug ?: Str::slug($request->title),
            'description'   => $request->description,
            'genre'         => $request->genre,
            'thumbnail_url' => $request->thumbnail_url,
            'poster_url'    => $request->poster_url,
            'visibility'    => $request->visibility,
            'status'        => $request->status,
            'is_featured'   => $request->has('is_featured'),
            'is_free'       => $request->has('is_free'),
        ]);

        // Create series-specific record
        $series = Serie::create([
            'content_id'   => $content->id,
            'trailer_url'  => $request->trailer_url,
            'release_year' => $request->release_year,
            'language'     => $request->language,
        ]);

        return redirect()->route('series.index')
            ->with('success', 'Series created successfully!');
    }

    /**
     * Show one series management page
     */
    public function manage(Serie $series)
    {
        $series->load([
            'content',
            'seasons.episodes'
        ]);

        return view('admin.manage-series.manage-serie', compact('series'));
    }
}

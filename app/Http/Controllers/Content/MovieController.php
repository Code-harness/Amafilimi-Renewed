<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{
        /**
     * Show movie upload form
     */

        public function show_index(){

        $movies 


        }


    /**
     * Show movie upload form
     */
    public function create()
    {
        return view('admin.manage-movie.add-movie');
    }

    /**
     * Store a new movie
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:contents,slug',
            'description' => 'required|string',
            'thumbnail_url' => 'required|url',
            'poster_url' => 'nullable|url',
            'genre' => 'required|string|max:50',
            'release_year' => 'required|integer|min:1900|max:' . date('Y'),
            'duration' => 'required|integer|min:1',
            'language' => 'nullable|string|max:50',
            'embed_url' => 'required|url',
            'trailer_url' => 'nullable|url',
            'visibility' => 'required|in:public,private,premium',
            'status' => 'required|in:draft,published,scheduled',
            'is_featured' => 'sometimes|boolean',
            'is_free' => 'sometimes|boolean',
        ]);

        // Generate slug if empty
        $slug = $request->slug ?: Str::slug($request->title . '-' . time());

        // Create content record first
        $content = Content::create([
            'type' => 'movie',
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->description,
            'genre' => $request->genre,
            'thumbnail_url' => $request->thumbnail_url,
            'poster_url' => $request->poster_url,
            'visibility' => $request->visibility,
            'status' => $request->status,
            'is_featured' => $request->has('is_featured'),
            'is_free' => $request->has('is_free'),
            'published_at' => $request->status === 'published' ? now() : null,
            'created_by' => Auth::id(),
        ]);

        // Create movie record
        $movie = Movie::create([
            'content_id' => $content->id,
            'embed_url' => $request->embed_url,
            'trailer_url' => $request->trailer_url,
            'duration' => $request->duration,
            'release_year' => $request->release_year,
            'language' => $request->language,
        ]);

        return redirect()->route('admin.manage.movies')
            ->with('success', 'Movie uploaded successfully!');
    }
}

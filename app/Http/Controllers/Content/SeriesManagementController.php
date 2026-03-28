<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SeriesManagementController extends Controller
{
   public function index()
    {
        $seriesList = Series::with([
            'content',
            'seasons.episodes'
        ])->get();

        $seriesList->each(function ($series) {
            $series->episodes_count = $series->seasons->sum(fn($season) => $season->episodes->count());
        });

        return view('admin.series.index', compact('seriesList'));
    }

    public function show(Series $series)
    {
        $series->load([
            'content',
            'seasons.episodes'
        ]);

        return view('admin.series.manage', compact('series'));
    }
}

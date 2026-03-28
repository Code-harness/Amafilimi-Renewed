<?php

use App\Http\Controllers\Content\EpisodeController;
use App\Http\Controllers\Content\SeasonController;
use App\Http\Controllers\Content\SerieController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {

    // Series Management
    Route::get('/series', [SerieController::class, 'index'])->name('series.index');
    Route::get('/series/create', [SerieController::class, 'create'])->name('series.create');
    Route::post('/series', [SerieController::class, 'store'])->name('series.store');

    // Manage one series
    Route::get('/series/{series}/manage', [SerieController::class, 'manage'])->name('admin.series.manage');

    // Seasons under a series
    Route::post('/series/{serie}/seasons', [SeasonController::class, 'store'])->name('admin.series.seasons.store');
    Route::delete('/series/{serie}/seasons/{season}', [SeasonController::class, 'destroy'])->name('admin.series.seasons.destroy');

    // Episodes under a season
    Route::get('/seasons/{season}/episodes', [EpisodeController::class, 'index'])->name('admin.seasons.episodes.index');
    Route::post('/seasons/{season}/episodes', [EpisodeController::class, 'store'])->name('admin.seasons.episodes.store');
});

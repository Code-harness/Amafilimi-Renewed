<?php

use App\Http\Controllers\Content\EpisodeController;
use App\Http\Controllers\Content\MovieController;
use App\Http\Controllers\Content\SeasonController;
use App\Http\Controllers\Content\SerieController;
use App\Http\Controllers\Content\SeriesManagementController;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

Route::get('/', function () {
    return view('welcome');
})->name('landing');


Route::get('/movies', function () {
    return view('users.all-movies');
})->name('user.movies');

Route::get('/movies/details', function () {
    return view('users.movie-details');
})->name('user.movies.details');

Route::get('/series', function () {
    return view('users.all-series');
})->name('user.series');


Route::get('/series/details', function () {
    return view('users.series-details');
})->name('user.series.details');

Route::get('/watch', function () {
    return view('users.players');
})->name('user.player');

Route::get('/profile', function () {
    return View('users.profile');
})->name('user.profile');


// Dashboard

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/manage-movies', [MovieController::class, 'show_index'])->name('admin.manage.movies');


Route::get('/create-movie', [MovieController::class, 'create'])->name('movies.create');

Route::post('/create-movie', [MovieController::class, 'store'])->name('movies.create');



Route::get('/manage-series', [SerieController::class, 'index'])->name('series.index');

Route::get('/series/{series}/manage', [SeriesManagementController::class, 'show'])->name('series.manage');

// Seasons under a series
Route::post('/series/{series}/seasons', [SeasonController::class, 'store'])->name('series.seasons.store');
Route::delete('/series/{series}/seasons/{season}', [SeasonController::class, 'destroy'])->name('series.seasons.destroy');

// Episodes under a season
Route::get('/seasons/{season}/episodes', [EpisodeController::class, 'index'])->name('seasons.episodes.index');
Route::post('/seasons/{season}/episodes', [EpisodeController::class, 'store'])->name('seasons.episodes.store');
Route::delete('/seasons/{season}/episodes/{episode}', [EpisodeController::class, 'destroy'])->name('seasons.episodes.destroy');


Route::get('/create-serie', [SerieController::class, 'create'])->name('series.create');
Route::post('/create-serie', [SerieController::class, 'store'])->name('series.create');

Route::get('/create-season', [SeasonController::class, 'create'])->name('season.create');

Route::post('/create-season', [SeasonController::class, 'store'])->name('seasons.store');


Route::get('/create-episode/{season}', [EpisodeController::class, 'create'])->name('admin.create.episode');
Route::post('/create-episode', [EpisodeController::class, 'store'])->name('admin.episodes.store');


Route::get('/manage-users', function () {
    return view('admin.manage-users.index');
})->name('admin.manage.users');

Route::get('/create-user', function () {
    return view('admin.manage-users.create-user');
})->name('admin.create.users');


include __DIR__ . '/auth.php';

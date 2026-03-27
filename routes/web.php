<?php

use App\Http\Controllers\Content\MovieController;
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

Route::get('/manage-movies', [MovieController::class,'show_index'])->name('admin.manage.movies');


Route::get('/create-movie', [MovieController::class, 'create'])->name('movies.create');

Route::post('/create-movie', [MovieController::class, 'store'])->name('movies.create');



Route::get('/manage-series', function () {
    return view('admin.manage-series.index');
})->name('admin.manage.series');

Route::get('/create-serie', function () {
    return view('admin.manage-series.add-serie');
})->name('admin.create.serie');

Route::get('/create-season', function () {
    return view('admin.manage-series.create-season');
})->name('admin.create.season');


Route::get('/create-episode', function () {
    return view('admin.manage-series.create-episode');
})->name('admin.create.episode');

Route::get('/manage-users', function () {
    return view('admin.manage-users.index');
})->name('admin.manage.users');

Route::get('/create-user', function () {
    return view('admin.manage-users.create-user');
})->name('admin.create.users');


include __DIR__ . '/auth.php';

<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


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


// Dashboard

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/manage-movies', function () {
    return view('admin.manage-movie.index');
})->name('admin.manage.movies');


Route::get('/manage-series', function () {
    return view('admin.manage-series.index');
})->name('admin.manage.series');

Route::get('/manage-users', function () {
    return view('admin.manage-users.index');
})->name('admin.manage.users');

Route::get('/create-user', function () {
    return view('admin.manage-users.create-user');
})->name('admin.create.users');
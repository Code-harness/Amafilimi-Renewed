<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;



Route::get('/login', function () {
    return view('auth.login');
})->name('login');


Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register',[RegisterController::class,'register'])->name('register');

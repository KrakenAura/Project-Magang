<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home0');
})->name('home')->middleware(['auth:sanctum']);
Route::get('/berita', function () {
    return view('berita');
});
Route::get('/galeri', function () {
    return view('galeri');
});
Route::get('/login', function () {
    return view('login');
})->name('login');

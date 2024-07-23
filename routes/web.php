<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/berita', function () {
    return view('berita');
});
Route::get('/galeri', function () {
    return view('galeri');
});

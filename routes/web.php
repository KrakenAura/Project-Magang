<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin');
});
Route::get('/berita', function () {
    return view('berita');
});
Route::get('/galeri', function () {
    return view('galeri');
});

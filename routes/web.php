<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home0');
})->name('home');
Route::get('/berita', function () {
    return view('berita');
});
Route::get('/galeri', function () {
    return view('galeri');
});
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/test-session', function () {
    session(['key' => 'value']);
    return session('key');
});

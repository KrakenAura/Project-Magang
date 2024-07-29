<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminController;

Route::get('/', function () {
    return view('home0');
})->name('home');
Route::get('/kota-terkini', function () {
    return view('kotaterkini');
});
Route::get('/layanan-publik', function () {
    return view('layananpublik');
});
Route::get('/kabar-balai-kota', function () {
    return view('kabarbalaikota');
});
Route::get('/citizen-journalist', function () {
    return view('citizenjournalist');
});
Route::get('/galeri', function () {
    return view('galeri');
});
Route::get('/tentang-kami', function () {
    return view('tentang_kami');
});

Route::get('/tautan', function () {
    return view('tautan');
});
Route::get('/pustaka', function () {
    return view('pustaka');
});
Route::get('/login', function () {
    return view('login');
})->name('login');


Route::get('/test-session', function () {
    session(['key' => 'value']);
    return session('key');
});

Route::get('/adminlogin', function () {
    return view('adminlogin');
})->name('adminlogin');

// Route::get('/admin/dashboard', function () {
//     return view('admin');
// })->name('dashboard');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

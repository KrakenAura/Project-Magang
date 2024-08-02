<?php

use App\Http\Controllers\Auth\VisitorController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\OutlookController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\LibraryController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::middleware('auth:sanctum')->get('/protected', function (Request $request) {
//     return response()->json(['message' => 'You have access!']);
// });


//Berita Routes
Route::get('/berita', [BeritaController::class, 'index']);
Route::get('/berita/{id}', [BeritaController::class, 'show']);
Route::post('/berita/create', [BeritaController::class, 'store'])->name('CreateBerita');
Route::put('/berita/update/{id}', [BeritaController::class, 'update'])->name('UpdateBerita');
Route::delete('/berita/delete/{id}', [BeritaController::class, 'destroy'])->name('berita.delete');

//Comment
Route::delete('/komentar/delete/{id}', [CommentController::class, 'destroy'])->name('komentar.delete');


//Galery Routes
Route::get('/galery', [GaleryController::class, 'index']);
Route::get('/galery/{id}', [GaleryController::class, 'show']);
Route::post('/galery/create', [GaleryController::class, 'store'])->name('CreateGaleri');
Route::put('/galery/update/{id}', [GaleryController::class, 'update'])->name('UpdateGaleri');
Route::delete('/galery/delete/{id}', [GaleryController::class, 'destroy'])->name('DeleteGalery');

//Outlook
Route::get('/programtv', [OutlookController::class, 'index']);
Route::get('/programtv/{id}', [OutlookController::class, 'show']);
Route::post('/programtv/create', [OutlookController::class, 'store'])->name('outlook.create');
Route::put('/programtv/update/{id}', [OutlookController::class, 'update'])->name('outlook.update');
Route::delete('/programtv/delete/{id}', [OutlookController::class, 'destroy'])->name('outlook.delete');

//wargabicaras
Route::get('/wargabicara', [ComplaintController::class, 'index']);
Route::get('/wargabicara/{id}', [ComplaintController::class, 'show']);
Route::post('/wargabicara/create', [ComplaintController::class, 'store']);
Route::put('/wargabicara/update/{id}', [ComplaintController::class, 'update']);
Route::delete('/wargabicara/delete/{id}', [ComplaintController::class, 'destroy'])->name('complaint.delete');

//Link TV
Route::get('/social', [SocialController::class, 'index']);
Route::get('/social/{id}', [SocialController::class, 'show']);
Route::post('/social/create', [SocialController::class, 'store']);
Route::put('/social/update/{id}', [SocialController::class, 'update']);
Route::delete('/social/delete/{id}', [SocialController::class, 'destroy']);

//Library
Route::get('/library', [LibraryController::class, 'index']);
Route::get('/library/{id}', [LibraryController::class, 'show']);
Route::post('/library/create', [LibraryController::class, 'store']);
Route::put('/library/update/{id}', [LibraryController::class, 'update']);
Route::delete('/library/delete/{id}', [LibraryController::class, 'destroy']);




// Visitor routes
Route::middleware(['web'])->group(function () {
    // Visitor Routes
    Route::post('/visitor/login', [VisitorController::class, 'login'])->name('visitor.login');
    Route::post('/visitor/register', [VisitorController::class, 'register'])->name('visitor.register');
    Route::post('/visitor/logout', [VisitorController::class, 'logout'])->name('visitor.logout');

    // Admin routes
    Route::post('/admin/login', [AdminController::class, 'login'])->name('api.admin.login');
    Route::post('/admin/register', [AdminController::class, 'register'])->name('api.admin.register');
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('api.admin.logout');
});









// Route::post('/login', [AuthController::class, 'login'])->name('api.login');
// Route::get('/logout', [AuthController::class, 'logout'])->middleware(['auth:sanctum'])->name('api.logout');

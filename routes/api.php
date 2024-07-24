<?php

use App\Http\Controllers\Auth\VisitorController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\AuthController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/protected', function (Request $request) {
    return response()->json(['message' => 'You have access!']);
});



Route::get('/berita', [BeritaController::class, 'index']);
Route::get('/berita/{id}', [BeritaController::class, 'show']);


// Visitor routes
Route::middleware(['web'])->group(function () {
    Route::post('/visitor/login', [VisitorController::class, 'login'])->name('visitor.login');
    Route::post('/visitor/register', [VisitorController::class, 'register'])->name('visitor.register');
    Route::post('/visitor/logout', [VisitorController::class, 'logout'])->name('visitor.logout');
});


// Admin routes
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/register', [AdminController::class, 'register'])->name('admin.register');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


// Route::post('/login', [AuthController::class, 'login'])->name('api.login');
// Route::get('/logout', [AuthController::class, 'logout'])->middleware(['auth:sanctum'])->name('api.logout');

<?php

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

Route::post('/login', [AuthController::class, 'login'])->name('api.login');
Route::get('/logout', [AuthController::class, 'logout'])->middleware(['auth:sanctum'])->name('api.logout');

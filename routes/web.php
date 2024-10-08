<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\OutlookController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

Route::post('/track-page-view', [DashboardController::class, 'trackPageView']);

//Home Route
Route::get('/', [HomeController::class, 'view_landing'])->name('home');

//Library Route
Route::get('/library', [LibraryController::class, 'index']);

//Contact Us Route

Route::get('/contactus', [SocialController::class, 'view_landing']);

//Profile Route
Route::get('/profil', [ProfileController::class, 'view_landing']);

//Berita Route
Route::get('/berita/{id}', [BeritaController::class, 'view_berita'])->name('berita.view');
Route::get('/kotaterkini', [BeritaController::class, 'view_landing_kotaterkini'])->name('kotaterkini.landing');
Route::get('/layananpublik', [BeritaController::class, 'view_landing_layananpublik'])->name('layananpublik.landing');
Route::get('/citizen', [BeritaController::class, 'view_landing_citizen'])->name('citizen.landing');
Route::get('/citizen/tulis', function () {
    return view('citizenwrite');
});
Route::get('/kabarbalaikota', [BeritaController::class, 'view_landing_kabarbalaikota'])->name('kabarbalaikota.landing');

//Route for Comments
Route::post('/comments', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');
Route::post('/comments/{comment}/reply', [CommentController::class, 'reply'])->middleware('auth')->name('comments.reply');

//Warga Bicara (Pengaduan) Route
Route::get('/warga-bicara', [ComplaintController::class, 'view_landing'])->name('complaint.landing');

//Program TV Route
Route::get('/programtv', [OutlookController::class, 'view_landing'])->name('programtv.landing');

//Galery Route
Route::get('/galeri', [GaleryController::class, 'view_landing'])->name('galeri.landing');

//Auth Route
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/adminlogin', function () {
    return view('adminlogin');
})->name('adminlogin');

//Dashboard Route
Route::prefix('/admin')->middleware(['admin'])->group(function () {

    //View Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //See all Komentar and Berita by Category Route
    Route::get('/komentar/category/{category}', [CommentController::class, 'view_komentar_by_category'])->name('komentar.by_category');
    Route::get('/berita/category/{category}', [BeritaController::class, 'view_by_category'])->name('berita.by_category');

    //Beranda
    Route::get('/beranda', [HomeController::class, 'view_dashboard'])->name('admin.beranda');

    //Kota Terkini
    Route::get('/kotaterkini', [BeritaController::class, 'view_dashboard_kotaterkini'])->name('admin.kotaterkini');
    Route::get('/kotaterkini/tambah', [BeritaController::class, 'view_kotaterkini_tambah'])->name('admin.kotaterkini_tambah');
    Route::get('/kotaterkini/edit/{id}', [BeritaController::class, 'view_kotaterkini_edit'])->name('admin.kotaterkini_edit');

    //Layanan Publik
    Route::get('/layananpublik', [BeritaController::class, 'view_dashboard_layananpublik'])->name('admin.layananpublik');
    Route::get('/layananpublik/tambah', [BeritaController::class, 'view_layananpublik_tambah'])->name('admin.layananpublik_tambah');
    Route::get('/layananpublik/edit/{id}', [BeritaController::class, 'view_layananpublik_edit'])->name('admin.layananpublik_edit');

    //Kabar Balai Kota
    Route::get('/kabarbalaikota', [BeritaController::class, 'view_dashboard_kabarbalaikota'])->name('admin.kabarbalaikota');
    Route::get('/kabarbalaikota/tambah', [BeritaController::class, 'view_kabarbalaikota_tambah'])->name('admin.kabarbalaikota_tambah');
    Route::get('kabarbalaikota/edit/{id}', [BeritaController::class, 'view_kabarbalaikota_edit'])->name('admin.kabarbalaikota_edit');

    //Citizen Journalist
    Route::get('/citizen', [BeritaController::class, 'view_dashboard_citizen'])->name('admin.citizen');

    //Program TV Desa
    Route::get('/programtvdesa', [OutlookController::class, 'view_dashboard'])->name('admin.programtvdesa');
    Route::get('/programtvdesa/tambah', [OutlookController::class, 'view_programtvdesa_tambah'])->name('admin.programtvdesa_tambah');
    Route::get('programtvdesa/edit/{id}', [OutlookController::class, 'view_programtvdesa_edit'])->name('admin.programtvdesa_edit');

    //Library
    Route::get('/library', [LibraryController::class, 'view_dashboard'])->name('admin.library');
    Route::get('/library/tambah', [LibraryController::class, 'view_library_tambah'])->name('admin.library_tambah');
    Route::get('library/edit/{id}', [LibraryController::class, 'view_library_edit'])->name('admin.library_edit');


    //Warga Bicara
    Route::get('/wargabicara', [ComplaintController::class, 'view_dashboard'])->name('admin.wargabicara');


    //Galeri
    Route::get('/galeri', [GaleryController::class, 'view_dashboard'])->name('admin.galeri');

    //Link TV Desa
    Route::get('/contactus', [SocialController::class, 'view_dashboard'])->name('admin.contacus');

    //Profile
    Route::get('/profil', [ProfileController::class, 'view_dashboard'])->name('admin.profile');
});

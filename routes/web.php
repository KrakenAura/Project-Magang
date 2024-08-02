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

Route::get('/', function () {
    return view('home0');
})->name('home');

Route::get('/berita/{id}', [BeritaController::class, 'view_berita'])->name('berita.view');

Route::get('/kotaterkini', [BeritaController::class, 'index'])->name('kotaterkini.index');
// Route::get('/galerri', [GaleryController::class, 'index'])->name('galeri.index');
// Route::get('/kota-terkini', function () {
//     return view('kotaterkini');
// });
Route::get('/layanan-publik', function () {
    return view('layananpublik');
});
Route::get('/kerja', function () {
    return view('dashboard/admin_contactus');
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
Route::get('/contactus', function () {
    return view('contactus');
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

Route::prefix('/admin')->middleware(['admin'])->group(function () {

    Route::get('/komentar/category/{category}', [CommentController::class, 'view_komentar_by_category'])->name('komentar.by_category');

    //Beranda
    Route::get('/beranda', function () {
        return view('dashboard/admin_beranda');
    })->name('admin.beranda');

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
    Route::get('/citizen/tambah', [BeritaController::class, 'view_citizen_tambah'])->name('admin.citizen_tambah');

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
    Route::get('/social', [SocialController::class, 'view_dashboard'])->name('admin.linktv');
});

Route::post('/comments', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');
Route::post('/comments/{comment}/reply', [CommentController::class, 'reply'])->middleware('auth')->name('comments.reply');

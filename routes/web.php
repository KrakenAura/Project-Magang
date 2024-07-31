<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GaleryController;

Route::get('/', function () {
    return view('home0');
})->name('home');

Route::get('/berita/{id}', [BeritaController::class, 'view_berita'])->name('berita.view');

Route::get('/kotaterkini', [BeritaController::class, 'index'])->name('kotaterkini.index');
Route::get('/galerri', [GaleryController::class, 'index'])->name('galeri.index');
// Route::get('/kota-terkini', function () {
//     return view('kotaterkini');
// });
Route::get('/layanan-publik', function () {
    return view('layananpublik');
});
Route::get('/kerja', function () {
    return view('kotaterkini');
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

Route::prefix('/admin')->middleware(['admin'])->group(function () {
    //Beranda
    Route::get('/beranda', function () {
        return view('dashboard/admin_beranda');
    })->name('admin.beranda');

    //Kota Terkini
    Route::get('/kotaterkini', [BeritaController::class, 'view_dashboard'])->name('admin.kotaterkini');
    Route::get('/kotaterkini/tambah', [BeritaController::class, 'view_tambah'])->name('admin.kotaterkini');
    Route::get('/admin/kotaterkini/edit/{id}', [BeritaController::class, 'view_edit'])->name('berita.edit');

    //Layanan Publik
    Route::get('/pelayananpublik', function () {
        return view('dashboard/pelayananpublik');
    })->name('admin.pelayananpublik');
    Route::get('/kabarbalaikota', function () {
        return view('dashboard/kabarbalaikota');
    })->name('admin.kabarbalaikota');
    Route::get('/citizenjournalist', function () {
        return view('dashboard/citizenjournalist');
    })->name('admin.citizenjournalist');
    Route::get('/galeri', function () {
        return view('dashboard/galeri');
    })->name('admin.galeri');
});

Route::post('/comments', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');
Route::post('/comments/{comment}/reply', [CommentController::class, 'reply'])->middleware('auth')->name('comments.reply');

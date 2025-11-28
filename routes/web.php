<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Halaman Publik
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/berita', [PublicController::class, 'berita'])->name('berita');
Route::get('/berita/{berita:id}', [PublicController::class, 'showBerita'])->name('berita.detail');

Route::get('/profil', function () {
    return view('pages.profil');
})->name('profil');

Route::get('/layanan', function () {
    return view('pages.layanan');
})->name('layanan');

Route::get('/sakip', function () {
    return view('pages.sakip');
})->name('sakip');

Route::get('/faq', function () {
    return view('pages.faq');
})->name('faq');

// Dashboard Admin (hanya untuk user yang sudah login)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Berita Routes
    Route::prefix('dashboard')->name('admin.')->group(function () {
        Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
        Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
        Route::get('/berita/{berita}', [BeritaController::class, 'show'])->name('berita.show');
        Route::get('/berita/{berita}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
        Route::put('/berita/{berita}', [BeritaController::class, 'update'])->name('berita.update');
        Route::delete('/berita/{berita}', [BeritaController::class, 'destroy'])->name('berita.destroy');
    });
});

// Profile Routes (hanya untuk user yang sudah login)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

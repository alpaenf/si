<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DokumenSakipController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\LayananController;
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

Route::get('/layanan', [PublicController::class, 'layanan'])->name('layanan');
Route::get('/sakip', [PublicController::class, 'sakip'])->name('sakip');
Route::get('/faq', [PublicController::class, 'faq'])->name('faq');
Route::post('/faq', [PublicController::class, 'submitFaq'])->name('faq.submit');

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

        // Dokumen SAKIP Routes
        Route::resource('dokumen-sakip', DokumenSakipController::class)->except(['show']);

        // Layanan Routes
        Route::resource('layanan', LayananController::class)->except(['show']);

        // FAQ Routes
        Route::resource('faq', FaqController::class)->except(['show']);
    });
});

// Profile Routes (hanya untuk user yang sudah login)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

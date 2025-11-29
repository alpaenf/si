<?php

use App\Http\Controllers\Api\V1\BeritaController;
use App\Http\Controllers\Api\V1\LayananController;
use App\Http\Controllers\Api\V1\FaqController;
use App\Http\Controllers\Api\V1\DokumenSakipController;
use App\Http\Controllers\Api\V1\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes - Version 1
|--------------------------------------------------------------------------
*/

// Public routes
Route::prefix('v1')->group(function () {
    // Authentication
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    
    // Public API endpoints (read-only)
    Route::get('/berita', [BeritaController::class, 'index']);
    Route::get('/berita/{id}', [BeritaController::class, 'show']);
    
    Route::get('/layanan', [LayananController::class, 'index']);
    Route::get('/layanan/{id}', [LayananController::class, 'show']);
    
    Route::get('/faq', [FaqController::class, 'index']);
    
    Route::get('/dokumen-sakip', [DokumenSakipController::class, 'index']);
    Route::get('/dokumen-sakip/{id}', [DokumenSakipController::class, 'show']);
});

// Protected routes (require authentication)
Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
    // Auth
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
    
    // Berita management
    Route::post('/berita', [BeritaController::class, 'store'])
        ->middleware('permission:berita.create');
    Route::put('/berita/{id}', [BeritaController::class, 'update'])
        ->middleware('permission:berita.edit');
    Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])
        ->middleware('permission:berita.delete');
    
    // Layanan management
    Route::post('/layanan', [LayananController::class, 'store'])
        ->middleware('permission:layanan.create');
    Route::put('/layanan/{id}', [LayananController::class, 'update'])
        ->middleware('permission:layanan.edit');
    Route::delete('/layanan/{id}', [LayananController::class, 'destroy'])
        ->middleware('permission:layanan.delete');
    
    // FAQ management
    Route::post('/faq', [FaqController::class, 'store'])
        ->middleware('permission:faq.create');
    Route::put('/faq/{id}', [FaqController::class, 'update'])
        ->middleware('permission:faq.edit');
    Route::delete('/faq/{id}', [FaqController::class, 'destroy'])
        ->middleware('permission:faq.delete');
    
    // Dokumen SAKIP management
    Route::post('/dokumen-sakip', [DokumenSakipController::class, 'store'])
        ->middleware('permission:dokumen-sakip.create');
    Route::put('/dokumen-sakip/{id}', [DokumenSakipController::class, 'update'])
        ->middleware('permission:dokumen-sakip.edit');
    Route::delete('/dokumen-sakip/{id}', [DokumenSakipController::class, 'destroy'])
        ->middleware('permission:dokumen-sakip.delete');
});

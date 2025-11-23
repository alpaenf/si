<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/profil', function () {
    return view('profil');
})->name('profil');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/sakip', function () {
    return view('sakip');
})->name('sakip');

Route::get('/layanan', function () {
    return view('layanan');
})->name('layanan');

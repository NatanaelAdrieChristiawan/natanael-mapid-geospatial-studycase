<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MapController;

// Rute Navigasi Utama
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/map', [MapController::class, 'index'])->name('map');

// Redirect sitemap.xml ke Live Map GIS
Route::redirect('/sitemap.xml', '/map');

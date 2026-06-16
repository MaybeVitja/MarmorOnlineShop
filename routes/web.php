<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes – MarmorArt
|--------------------------------------------------------------------------
*/

// Startseite (Linktree-Stil)
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Online-Shop (Platzhalter)
Route::get('/shop', function () {
    return view('shop');
})->name('shop');

// Optional: Impressum & Datenschutz
Route::get('/impressum', function () {
    return view('impressum');
})->name('impressum');

Route::get('/datenschutz', function () {
    return view('datenschutz');
})->name('datenschutz');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang-kami', [HomeController::class, 'about'])->name('about');
Route::get('/dokumentasi', [HomeController::class, 'documentation'])->name('documentation');
Route::get('/jejak-langkah', [HomeController::class, 'jejackLangkah'])->name('jejack-langkah');
Route::post('/ppdb/store', [HomeController::class, 'storePpdbRegistration'])
    ->middleware('throttle:ppdb')
    ->name('ppdb.store');

// Article routes
Route::get('/artikel', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/artikel/{article}', [ArticleController::class, 'show'])->name('articles.show');
Route::post('/artikel/{article}/comments', [ArticleController::class, 'storeComment'])->name('articles.comment.store');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Pages\ArticleController;
use App\Http\Controllers\Pages\ProgramController;
use App\Http\Controllers\Pages\MemberController;

/*
|--------------------------------------------------------------------------
| Public Routes (Guest / Pembaca)
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::view('/tentang', 'pages.tentang')->name('tentang');

Route::get('/program', [ProgramController::class, 'index'])->name('program');

Route::get('/organisasi', [MemberController::class, 'index'])->name('organisasi');

Route::get('/artikel', [ArticleController::class, 'index'])
    ->name('artikel.index');

Route::get('/artikel/{slug}', [ArticleController::class, 'show'])
    ->name('artikel.show');

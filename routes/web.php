<?php

use App\Http\Middleware\CheckAuth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\RevisorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// home con ultimi 6 annunci
Route::get('/', [AdController::class,'index'])->name('ads.index');

// crea annuncio
Route::get('/ad/new', [AdController::class,'create'])->middleware('auth')->name('ad.create');

// annunci per categoria
Route::get('/ads/{category}', [AdController::class, 'adsByCategory'])->name('adsByCategory');

// vedi annuncio
Route::get('/ad/{ad}', [AdController::class, 'show'])->name('ad.show');

// socialite google
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// preferiti
Route::get('/favs', [AdController::class, 'favs'])->middleware('auth')->name('ads.favs');

// ricerca annuncio
Route::get('/search/ads', [AdController::class, 'searchAds'])->name('ads.search');

Route::get('/revisor/home',[RevisorController::class,'index'])->middleware('isRevisor')->name('revisor.index');

Route::patch('/accetta/annuncio/{announcement}',[RevisorController::class,'acceptAnnouncement'])->name('revisor.accept_announcement');

Route::patch('/rifiuta/annuncio/{announcement}', [RevisorController::class,'rejectAnnouncement'])->name('revisor.reject_announcement');

Route::get('/revisor/work', [RevisorController::class, 'workWithUs'])->name('revisor.work');


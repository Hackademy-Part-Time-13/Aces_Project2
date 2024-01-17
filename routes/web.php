<?php

use App\Http\Middleware\CheckAuth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ContactController;
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
Route::get('/', [PageController::class,'home'])->name('home');

// index annunci
Route::get('/ads/index', [AdController::class,'index'])->name('ads.index');

// crea annuncio
Route::get('/ad/new', [AdController::class,'create'])->middleware(['verified'])->name('ad.create');

// annunci per categoria e utente
Route::get('/ads/category/{category}', [AdController::class, 'adsByCategory'])->name('adsByCategory');
Route::get('/ads/user/{user}', [AdController::class, 'adsByUser'])->name('adsByUser');

// vedi annuncio
Route::get('/ad/{ad}', [AdController::class, 'show'])->name('ad.show');

// socialite google
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// preferiti
Route::get('/favs', [AdController::class, 'favs'])->middleware('auth')->name('ads.favs');

// ricerca annuncio
Route::get('/search/ads', [AdController::class, 'searchAds'])->name('ads.search');

// rotte revisore
Route::get('/revisor/home',[RevisorController::class,'index'])->middleware('isRevisor')->name('revisor.index');
Route::patch('/revisor/accept/{ad}',[RevisorController::class,'acceptAd'])->name('revisor.accept_ad');
Route::patch('/revisor/reject/{ad}', [RevisorController::class,'rejectAd'])->name('revisor.reject_ad');
Route::get('/revisor/back/{ad}',[RevisorController::class,'back'])->name('revisor.back'); 
Route::get('/revisor/restore/{ad}',[RevisorController::class,'restore'])->name('revisor.restore'); 

// lavora con noi - diventa revisore - Mail
Route::get('/work-With-Us', [RevisorController::class, 'workWithUs'])->middleware('auth')->name('workWithUs');
Route::post('/mail', [ContactController::class, 'workMail'])->middleware('auth')->name('work.mail');
Route::get('/turnsinto-revisor/{user}', [ContactController::class, 'makeRevisor'])->name('turnsinto.revisor');




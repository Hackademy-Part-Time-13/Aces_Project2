<?php

use App\Http\Middleware\CheckAuth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GoogleController;


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

Route::get('/', [AdController::class,'index'])->name('ads.index');

Route::get('/ad/new', [AdController::class,'create'])->middleware('auth')->name('ad.create');

Route::get('/ads/{category}', [AdController::class, 'adsByCategory'])->name('adsByCategory');
Route::get('/ad/{ad}', [AdController::class, 'retail'])->name('ad.show');

Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('/favs', [AdController::class, 'favs'])->middleware('auth')->name('favs');
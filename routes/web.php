<?php

use App\Http\Middleware\CheckAuth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\AnnouncementController;


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

Route::get('/', [HomeController::class,'welcome'])->name('home');

Route::get('/insert', [AnnouncementController::class,'insert'])->middleware('auth')->name('insert');

Route::get('/category/{category}', [CategoryController::class, 'categoryShow'])->name('categoryShow');

Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('/announcements/retail',[AnnouncementController::class,'retail']);
 
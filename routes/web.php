<?php

use App\Http\Controllers\artisController;
use App\Http\Controllers\authController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\konserController;
use App\Http\Controllers\lokasiController;
use App\Http\Controllers\promotorController;
use App\Http\Controllers\sponsorController;
use App\Http\Controllers\tiketController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/login', fn () => view('auth.login')) -> name('login');
Route::post('/login', [authController::class, 'login']);
Route::get('/logout', [authController::class, 'logout']);
Route::get('/dashboard', [dashboardController::class, 'index'])->middleware('auth');

Route::resource('artis', artisController::class);
Route::resource('konser', konserController::class);
Route::resource('tiket', tiketController::class);
Route::resource('lokasi', lokasiController::class);
Route::resource('promotor', promotorController::class);
Route::resource('sponsor', sponsorController::class);



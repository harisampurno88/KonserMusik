<?php

use App\Http\Controllers\artisController;
use App\Http\Controllers\authController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\konserController;
use App\Http\Controllers\lokasiController;
use App\Http\Controllers\promotorController;
use App\Http\Controllers\sponsorController;
use App\Http\Controllers\tiketController;
use App\Http\Controllers\transaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('utama');
});

Route::get('/login', fn () => view('auth.login')) -> name('login');
Route::post('/login', [authController::class, 'login']);
Route::group(['middleware' => ['auth', 'check_role:admin']], function () {
    Route::get('/dashboard', [dashboardController::class, 'index']);
    Route::resource('artis', artisController::class);
    Route::resource('konser', konserController::class);
    Route::resource('tiket', tiketController::class);
    Route::resource('lokasi', lokasiController::class);
    Route::resource('promotor', promotorController::class);
    Route::resource('sponsor', sponsorController::class);

    Route::get('/transaksi', [transaksiController::class, 'indexAdmin'])->name('transaksi.index');
});
Route::group(['middleware' => ['auth', 'check_role:user']], function () {
    Route::get('/user', [UserController::class, 'index']);
    Route::get('transaksi/create', [transaksiController::class, 'create'])-> name('transaksi.create');
    Route::post('transaksi/store', [transaksiController::class, 'store'])-> name('transaksi.store');
    Route::get('transaksi/{transaksi}', [transaksiController::class, 'show'])->name('transaksi.show');
});
Route::get('/logout', [authController::class, 'logout']);





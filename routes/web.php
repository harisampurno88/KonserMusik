<?php

use App\Http\Controllers\artisController;
use App\Http\Controllers\authController;
use App\Http\Controllers\dashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', fn () => view('auth.login')) -> name('login');
Route::post('/login', [authController::class, 'login']);
Route::get('/dashboard', [dashboardController::class, 'index']);

Route::resource('artis', artisController::class);


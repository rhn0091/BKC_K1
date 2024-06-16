<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KonselorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();



Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// Dashboard route
Route::middleware(['auth'])->group(function () {
    Route::get('/bkc/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
});

// Konselor dashboard route
Route::middleware(['auth', 'role.konselor'])->group(function () {
    Route::get('dashboard', [KonselorController::class, 'dashboard'])->name('konselor.dashboard');
});

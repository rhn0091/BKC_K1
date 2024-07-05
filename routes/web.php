<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\KonselorController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AppointmentController;

// Route untuk halaman utama
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route untuk halaman kontak
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');

// Route untuk login dan logout
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk registrasi
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// Route yang membutuhkan autentikasi
Route::middleware(['auth'])->group(function () {

    // Dashboard umum
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Dashboard konselor (contoh middleware 'role' untuk memeriksa peran pengguna)
    Route::middleware('role:konselor')->group(function () {
        Route::get('/konselor/dashboard', [KonselorController::class, 'dashboard'])->name('konselor.dashboard');
    });

    // Profil pengguna
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');

    // Profil konselor
    Route::get('/konselor/{id}/profile', [KonselorController::class, 'profil'])->name('konselor.profile');

    // Chat dengan konselor
    Route::get('/chat/{konselor}', [ChatController::class, 'show'])->name('chat');
    Route::post('/chat/{konselor}', [ChatController::class, 'store'])->name('chat.store');

    // Appointments
    Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::patch('/appointments/{id}/status', [AppointmentController::class, 'updateStatus'])->name('appointments.updateStatus');

});

// Route untuk halaman kontak (contoh tidak perlu di dalam middleware auth)
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');

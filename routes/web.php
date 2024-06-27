<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KonselorController;
use App\Http\Controllers\KontakController;

Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');



Route::get('/ ', [HomeController::class, 'index'])->name('home');





// Route untuk profil
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/konselor/{id}/profile', [KonselorController::class, 'profil'])->name('konselor.profile');
});
// Auth::routes(['verify' => true]);



Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');




Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/konselor/dashboard', [KonselorController::class, 'dashboard'])->name('konselor.dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
    

});


// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Auth\AuthController;
// use App\Http\Controllers\HomeController;
// use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\KonselorController;
// use App\Http\Controllers\DashboardController;

// // Route untuk halaman utama
// Route::get('/', [HomeController::class, 'index'])->name('home');

// // Route untuk login dan logout
// Route::get('/login', [AuthController::class, 'login'])->name('login');
// Route::post('/login', [AuthController::class, 'login'])->name('login.post');
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// // Route untuk registrasi
// Route::get('/register', [AuthController::class, 'register'])->name('register');
// Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// // Route untuk profil
// Route::middleware(['auth'])->group(function () {
//     Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
//     Route::get('/profile/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
//     Route::get('/konselor/{id}/profile', [KonselorController::class, 'profil'])->name('konselor.profile');
// });

// // Route untuk dashboard umum
// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// });

// // Route untuk dashboard konselor
// Route::middleware(['auth', 'role'])->group(function () {
//     Route::get('/konselor/dashboard', [KonselorController::class, 'dashboard'])->name('konselor.dashboard');
// });

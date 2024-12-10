<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KasusController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\WalikelasController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->name('auth.')->controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginTypes')->name('login.types'); // Menampilkan jenis login
    Route::get('/login/{type}', 'showLoginForm')->name('login.form'); // Form login sesuai tipe
    Route::post('/login', 'login')->name('login.submit'); // Proses login
    Route::get('/logout', 'logout')->name('logout'); // Logout
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('/', 'index')->name('dashboard');
    Route::post('/search', 'search')->name('dashboard.search');
});

Route::middleware(['role:siswa,walikelas,admin'])->group(function () {
    Route::view('/dashboard', 'dashboard'); 

    Route::resource('walikelas', WalikelasController::class)->except('show');

    Route::resource('kasus', KasusController::class)->except('show');

    Route::resource('kelas', KelasController::class)->except('show');

    Route::resource('siswa', SiswaController::class)->except('show');
    Route::get('/siswa/dashboard', [SiswaController::class, 'dashboard'])->name('siswa.dashboard');

});
<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\BasisPengetahuanController;
use App\Http\Controllers\EdukasiController;
use App\Http\Controllers\HasilDiagnosaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

Route::get('/admin', function () {
   return redirect()->to(route('admin.login')); 
});
Route::view('/', 'welcome');

Route::controller(AuthController::class)->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/login', 'indexAdmin')->name('admin.login');
        Route::post('/login', 'login')->name('admin.login');
    });
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(DashboardController::class)->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });
    Route::get('/beranda', 'beranda')->name('beranda');
});

Route::prefix('admin')->group(function () {
    Route::resources([
        'penyakit' => PenyakitController::class,
        'gejala' => GejalaController::class,
        'nilai-cf' => BasisPengetahuanController::class,
        'edukasi' => EdukasiController::class,
        'riwayat-diagnosa' => HasilDiagnosaController::class,
        'pengguna' => UserController::class
    ]);
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/diagnosa', 'diagnosa')->name('diagnosa');
    Route::post('/diagnosa', 'store')->name('diagnosa');
    Route::get('/riwayat', 'riwayat')->name('riwayat');
    Route::post('/riwayat', 'riwayat-detail')->name('riwayat');
});
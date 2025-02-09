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
Route::get('/', function () {
    if (session('login') && session('group') == 1) {
        return redirect()->to(route('dashboard'));
    }
    return redirect()->to(route('beranda'));
})->name('app');
Route::controller(AuthController::class)->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/login', 'indexAdmin')->name('admin.login');
        Route::post('/login', 'login')->name('admin.login');
    });
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'login')->name('login');
    Route::get('/register', 'indexRegister')->name('register');
    Route::post('/register', 'register')->name('register');
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
    Route::post('/riwayat-diagnosa', [HasilDiagnosaController::class, 'detail'])->name('riwayat-diagnosa.detail');
    Route::post('/riwayat-diagnosa/print', [HasilDiagnosaController::class, 'print'])->name('riwayat-diagnosa.print');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/diagnosa', 'diagnosa')->name('diagnosa');
    Route::post('/diagnosa', 'store')->name('diagnosa');
    Route::get('/edukasi', 'edukasi')->name('edukasi');
    Route::get('/edukasi/{id}', 'artikel_detail')->name('edukasi_detail');
    Route::get('/about', 'about')->name('about');
    Route::get('/riwayat', 'riwayat')->name('riwayat');
    Route::post('/riwayat', 'riwayat_detail')->name('riwayat');
    Route::post('/riwayat/print', 'print')->name('riwayat.print');
});
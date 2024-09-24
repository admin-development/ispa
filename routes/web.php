<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::view('/', 'welcome');

Route::controller(AuthController::class)->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/login', 'indexAdmin')->name('admin.login');
        Route::post('/login', 'login')->name('admin.login');
        Route::post('/logout', 'logout')->name('admin.logout');
    });
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(DashboardController::class)->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', 'index')->name('admin.dashboard');
    });
    Route::get('/beranda', 'beranda')->name('beranda');
});

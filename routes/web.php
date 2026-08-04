<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\BusController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StopController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/cari-rute', SearchController::class)->name('search');
Route::get('/bus/{bus}', [BusController::class, 'show'])->name('buses.show');
Route::get('/halte/{stop}', [StopController::class, 'show'])->name('stops.show');

// Login pengguna sudah tidak digunakan. Akses URL lama dikembalikan ke beranda.
Route::redirect('/login', '/');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [Admin\AdminLoginController::class, 'create'])->name('login');
    Route::post('login', [Admin\AdminLoginController::class, 'store'])->name('login.store');

    Route::middleware(['admin.auth', 'admin'])->group(function () {
        Route::redirect('/', '/admin/dashboard');
        Route::get('dashboard', Admin\AdminDashboardController::class)->name('dashboard');
        Route::resource('buses', Admin\BusController::class);
        Route::resource('stops', Admin\StopController::class);
        Route::resource('routes', Admin\RouteController::class);
        Route::resource('schedules', Admin\ScheduleController::class);
        Route::post('logout', [Admin\AdminLoginController::class, 'destroy'])->name('logout');
    });
});

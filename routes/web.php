<?php

use App\Http\Controllers\BusController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StopController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/cari-rute', SearchController::class)->name('search');
Route::get('/rute', [PageController::class, 'routes'])->name('routes.index');
Route::get('/halte', [PageController::class, 'stops'])->name('stops.index');
Route::get('/tentang', [PageController::class, 'about'])->name('about');
Route::get('/bus/{bus}', [BusController::class, 'show'])->name('buses.show');
Route::get('/halte/{stop}', [StopController::class, 'show'])->name('stops.show');

// Login pengguna sudah tidak digunakan. Akses URL lama dikembalikan ke beranda.
Route::redirect('/login', '/');

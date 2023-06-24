<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\StatsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/stats', [StatsController::class, 'index'])->name('stats');
Route::get('/servers', [ServerController::class, 'show'])->name('show.servers');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/admin-servers', [ServerController::class, 'index'])->name('servers');
    Route::post('/admin-servers', [ServerController::class, 'store']);

    Route::get('/admin-logos', [LogoController::class, 'index'])->name('logo');
    Route::post('/admin-logos', [LogoController::class, 'store']);
    Route::patch('/admin-logos/status/{logo:id}', [LogoController::class, 'update'])->name('logo.activate');
});

require __DIR__.'/auth.php';

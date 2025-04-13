<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TruckController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\DriverController;

// Página inicial
Route::get('/', function () {
    return view('welcome');
});

// Dashboard após autenticação
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rotas protegidas por autenticação
Route::middleware('auth')->group(function () {
    // Rotas de perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Rotas de recursos
    Route::resource('trucks', TruckController::class);
    Route::resource('routes', RouteController::class);
    Route::resource('drivers', DriverController::class);
});

require __DIR__.'/auth.php';
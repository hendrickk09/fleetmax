<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TruckController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\DriverController;

// Exemplo de rotas
Route::get('/', function () {
    return view('welcome');
});

<<<<<<< HEAD
Route::resource('trucks', TruckController::class);
Route::resource('routes', RouteController::class);
Route::resource('drivers', DriverController::class);
=======
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
>>>>>>> 3de785ae189018f88177b44d4d0e77c2b2cfd867

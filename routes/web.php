<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TruckController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\DriverController;

// Exemplo de rotas
Route::get('/', function () {
    return view('welcome');
});

Route::resource('trucks', TruckController::class);
Route::resource('routes', RouteController::class);
Route::resource('drivers', DriverController::class);

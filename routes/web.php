<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UpdateProfileController;
use App\Http\Controllers\HomeController;



// Login

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/', [LoginController::class, 'login']);


// Cerrar la sesion 

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');


// Rutas protegidas por el auth

// Inicio

Route::get('/dashboard', [HomeController::class, 'index'])->middleware('auth')->name('inicio');

// Configuracion de usuario

Route::get('/configuration', [UpdateProfileController::class, 'index'])->middleware('auth')->name('configuration');
Route::put('/configuration', [UpdateProfileController::class, 'update'])->middleware('auth');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UpdateProfileController;


// Login

Route::get('/', function () {
    return view('login');
})->name('login')->middleware('guest');

Route::post('/', [LoginController::class, 'login']);

// Cerrar la sesion 

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');


// Rutas protegidas por el auth

// Inicio

Route::get('/dashboard', function(){

    return view('admin/pages/dashboard');

})->middleware('auth')->name('inicio');

// Configuracion de usuario

Route::get('/configuration', [UpdateProfileController::class, 'index'])->middleware('auth')->name('configuration');
Route::put('/configuration', [UpdateProfileController::class, 'update'])->middleware('auth');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;


// Login

Route::get('/', function () {
    return view('login');
})->name('login')->middleware('guest');

Route::post('/', [LoginController::class, 'login']);

// Cerrar la sesion 

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');


// Rutas protegidas por el auth

Route::get('/dashboard', function(){

    return view('admin/pages/dashboard');

})->middleware('auth');
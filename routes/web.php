<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UpdateProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdministrationUserController;
use App\Http\Controllers\UserUpdateController;
use App\Http\Controllers\ResetPasswordController;



// Login

Route::get('/', [LoginController::class, 'index'])->middleware('guest')->name('login');

Route::post('/', [LoginController::class, 'login']);


// Cerrar la sesion 

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

// Reestablecer contraseña

Route::get('/email-recuperation', [ResetPasswordController::class, 'email_recuperation'])->name('email_recuperation');
Route::post('/email-recuperation', [ResetPasswordController::class, 'email_recuperation_redirect']);
Route::post('/reset-password/{id}', [ResetPasswordController::class, 'index'])->name('reset-password');
Route::get('/reset/password/{token}', [ResetPasswordController::class, 'update_password_template'])->name('update_password');
Route::post('/reset/password/{token}', [ResetPasswordController::class, 'update_password']);


// Rutas protegidas por el auth

// Inicio

Route::get('/dashboard', [HomeController::class, 'index'])->middleware('auth')->name('inicio');
Route::post('/dashboard', [HomeController::class, 'solicitacion'])->middleware('auth');

// Configuracion de usuario

Route::get('/configuration', [UpdateProfileController::class, 'index'])->middleware('auth')->name('configuration');
Route::put('/configuration', [UpdateProfileController::class, 'update'])->middleware('auth');

// Administracion de perfiles

Route::get('/administration-user', [AdministrationUserController::class, 'index'])->middleware('auth')->name('administration-profile');
Route::post('/administration-user', [AdministrationUserController::class, 'create_user'])->middleware('auth');

//Administrar perfil individual

Route::get('/administration-user/{id}', [UserUpdateController::class, 'index'])->middleware('auth')->name('profile_indivual');
Route::post('/administration-user/{id}', [UserUpdateController::class, 'update'])->middleware('auth');
Route::get('/administration-user/{id}/deleting', [UserUpdateController::class, 'delete'])->middleware('auth')->name('profile_indivual_delete');


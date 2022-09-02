<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RegisterVisitController;
use App\Http\Controllers\Api\NotificationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Consultas de visitas y notificacion del mismo laravel
Route::get('/visits', [RegisterVisitController::class, 'consults']);
Route::get('/notifications', [NotificationController::class, 'index']);


//Registros desde la pagina
Route::get('/', [RegisterVisitController::class, 'index']);

<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProyectoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Página principal
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('proyectos.index');
    }

    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| Rutas para usuarios NO autenticados
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    // Inicio de sesión
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.process');

    // Registro
    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.process');
});

/*
|--------------------------------------------------------------------------
| Rutas para usuarios autenticados
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Cerrar sesión
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    // Gestión de proyectos
    Route::get('/proyectos', [ProyectoController::class, 'index'])
    ->name('proyectos.index');

//Se deberian agregar para la implementacion web
    
//    Route::prefix('api')->group(function () {
//    Route::get('/proyectos', [ProyectoController::class, 'index']);
//    Route::post('/proyectos', [ProyectoController::class, 'store']);
//    Route::get('/proyectos/{id}', [ProyectoController::class, 'show']);
//    Route::put('/proyectos/{id}', [ProyectoController::class, 'update']);
//    Route::patch('/proyectos/{id}', [ProyectoController::class, 'update']);
//    Route::delete('/proyectos/{id}', [ProyectoController::class, 'destroy']);
//});
});
<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::prefix('user')->group(function () {

    Route::get('/', [UserController::class, 'lista']);

    Route::post('/criar', [UserController::class, 'store']);

    Route::put('/{id}', [UserController::class, 'atualizar']);

    Route::delete('/{id}', [UserController::class, 'delete']);

});


Route::prefix('auth')->group(function (){
    Route::post('login', [LoginController::class, 'login']);

});

Route::prefix('tarefas')->group(function () {
    Route::get('/', [TaskController::class, 'lista']); 
    Route::get('/status/{status}', [TaskController::class, 'filtrarPorStatus']); 
    Route::post('/', [TaskController::class, 'criar']); 
    Route::put('/{id}', [TaskController::class, 'atualizar']); 
});
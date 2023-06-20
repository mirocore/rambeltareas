<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TareaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('categorias', CategoriaController::class);
Route::apiResource('tareas', TareaController::class);
Route::put("/tareas/estado/{tarea}", [TareaController::class, "cambiarEstado"]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

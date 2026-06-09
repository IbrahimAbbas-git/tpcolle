<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\ProjetController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Routes publiques
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Routes protégées (Nécessitent un Token Sanctum valide)
Route::middleware('auth:sanctum')->group(function () {
    // CORRECTION : Changement de GET en POST pour le logout (plus sécurisé)
    Route::post('/logout', [AuthController::class, 'logout']); 
});

Route::get('/tasks/{id}', [ProjetController::class, 'getProjectTasks']);
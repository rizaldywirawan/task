<?php

use App\Http\Controllers\Api\v1\Auth\LoginController;
use App\Http\Controllers\Api\v1\Auth\LogoutController;
use App\Http\Controllers\Api\v1\ProjectAssigneeController;
use App\Http\Controllers\Api\v1\ProjectController;
use App\Http\Controllers\Api\v1\ProjectTaskController;
use App\Http\Controllers\Api\v1\RegisterController;
use App\Http\Controllers\Api\v1\TaskAssigneeController;
use App\Http\Controllers\Api\v1\TaskController;
use App\Http\Controllers\Api\v1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// version 1
Route::prefix('v1')->group(function () {
    Route::middleware('guest')->post('login', [LoginController::class, 'store']);
    Route::middleware('guest')->post('register', [RegisterController::class, 'store']);
    Route::middleware('auth:sanctum')->delete('logout', [LogoutController::class, 'destroy']);
    Route::middleware('auth:sanctum')->apiResource('users', UserController::class);
    Route::middleware('auth:sanctum')->apiResource('projects', ProjectController::class);
    Route::middleware('auth:sanctum')->apiResource('tasks', TaskController::class);
    Route::middleware('auth:sanctum')->apiResource('tasks/{task}/assignees', TaskAssigneeController::class);
    Route::middleware('auth:sanctum')->apiResource('projects/{project}/tasks', ProjectTaskController::class);
    Route::middleware('auth:sanctum')->apiResource('projects/{project}/assignees', ProjectAssigneeController::class);
});

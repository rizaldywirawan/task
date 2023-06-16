<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::delete('/logout', [LogoutController::class, 'destroy'])->middleware('web');
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');


Route::middleware('auth:sanctum')->group(function() {
    Route::get('/', [TaskController::class, 'index']);


    Route::get('/projects', function() {
        return view('pages.index');
    });

    Route::get('/users', function() {
        return view('pages.index');
    });

});

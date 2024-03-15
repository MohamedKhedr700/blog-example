<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

// post routes
Route::prefix('/v1/posts')
    ->middleware(['auth:user'])
    ->group(function () {
        Route::post('/', [PostController::class, 'store']);
        Route::get('/', [PostController::class, 'index']);
    });

// user routes
Route::prefix('/v1/users')
    ->group(function () {
        Route::post('/register', [UserController::class, 'register']);
        Route::post('/verify', [UserController::class, 'verify']);
        Route::post('/login', [UserController::class, 'login']);
        Route::get('/profile', [UserController::class, 'profile']);
    });

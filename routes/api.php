<?php

use App\Http\Controllers\Post;
use App\Http\Controllers\User;
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
        Route::post('/', [Post\CrudController::class, 'store']);
        Route::get('/', [Post\CrudController::class, 'index']);
    });

// user routes
Route::prefix('/v1/users')
    ->group(function () {
        Route::post('/register', User\RegisterController::class);
        Route::post('/verify', User\VerificationController::class);
        Route::post('/login', User\LoginController::class);
        Route::get('/profile', User\ProfileController::class)->middleware(['auth:user']);
    });

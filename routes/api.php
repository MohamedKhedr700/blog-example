<?php

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

// admin routes
Route::prefix('/v1/admins')
    ->group(function () {

    });

// post routes
Route::prefix('/v1/posts')
    ->group(function () {

    });

// user routes
Route::prefix('/v1/users')
    ->group(function () {

    });

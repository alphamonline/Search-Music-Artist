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

Route::group(['prefix' => 'v1'], function () {

    //Authenticated Routes
    Route::middleware('auth:sanctum')->group(function () {

    });

    Route::group(['prefix' => 'auth'], function () {
        Route::post('register', [\App\Http\Controllers\API\v1\UserController::class, 'store']);
        Route::post('login', [\App\Http\Controllers\API\v1\AuthController::class, 'login']);
    });

});

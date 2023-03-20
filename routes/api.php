<?php

use App\Http\Controllers\API\v1\AuthController;
use App\Http\Controllers\API\v1\UserController;
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

    Route::group(['prefix' => 'auth'], function () {
        Route::post('register', [AuthController::class, 'register']);
        Route::post('login', [AuthController::class, 'login']);
    });

    //Authenticated Routes
    Route::middleware('auth:sanctum')->group(function () {

        Route::get('user/{id}', [UserController::class, 'show']);
        Route::post('logout', [AuthController::class, 'logout']);
    });

});
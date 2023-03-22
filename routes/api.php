<?php

use App\Http\Controllers\API\v1\AuthController;
use App\Http\Controllers\API\v1\lastfm\FavoriteAlbumController;
use App\Http\Controllers\API\v1\lastfm\FavoriteArtistController;
use App\Http\Controllers\API\v1\lastfm\HomeController;
use App\Http\Controllers\API\v1\SocialAuthController;
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

        Route::get('{provider}/redirect', [SocialAuthController::class, 'redirect']);
        Route::get('{provider}/callback', [SocialAuthController::class, 'callback']);
    });

    //Last.fm Get top albums request
    Route::get('top-albums', [HomeController::class, 'topAlbums']);
    //Last.fm Get top artists request
    Route::get('top-artists', [HomeController::class, 'topArtists']);
    //Last.fm Get top tracks request
    Route::get('top-tracks', [HomeController::class, 'topTracks']);

    //Auth User Profile favorite albums requests-resource
    Route::apiResource('/favorite-albums', FavoriteAlbumController::class);
    //Auth User Profile favorite artists requests-resource
    Route::apiResource('/favorite-artists', FavoriteArtistController::class);

    //Authenticated Routes
    Route::middleware('auth:sanctum')->group(function () {



        Route::get('user/{id}', [UserController::class, 'show']);
        Route::post('logout', [AuthController::class, 'logout']);
    });

});

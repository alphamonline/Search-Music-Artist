<?php

namespace App\Http\Controllers\API\v1\lastfm;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFavoriteAlbumRequest;
use App\Http\Requests\UpdateFavoriteAlbumRequest;
use App\Http\Resources\FavoriteAlbumResource;
use App\Models\FavoriteAlbum;
use App\Services\FavoriteAlbumService;
use Illuminate\Http\Request;

class FavoriteAlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, FavoriteAlbumService $favoriteAlbumService)
    {
        return $favoriteAlbumService->getFavoriteAlbums($request);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFavoriteAlbumRequest $request, FavoriteAlbumService $favoriteAlbumService)
    {
        return $favoriteAlbumService->createFavoriteAlbum($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(FavoriteAlbum $favoriteAlbum, Request $request, FavoriteAlbumService $favoriteAlbumService)
    {
        return $favoriteAlbumService->getCurrentFavoriteAlbum($favoriteAlbum, $request);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFavoriteAlbumRequest $request, FavoriteAlbum $favoriteAlbum, FavoriteAlbumService $favoriteAlbumService)
    {
        return $favoriteAlbumService->updateFavoriteAlbum($request, $favoriteAlbum);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FavoriteAlbum $favoriteAlbum, Request $request, FavoriteAlbumService $favoriteAlbumService)
    {
        return $favoriteAlbumService->deleteFavoriteAlbum($favoriteAlbum, $request);
    }
}

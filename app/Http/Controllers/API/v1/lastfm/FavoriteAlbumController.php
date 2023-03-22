<?php

namespace App\Http\Controllers\API\v1\lastfm;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFavoriteAlbumRequest;
use App\Http\Requests\UpdateFavoriteAlbumRequest;
use App\Http\Resources\FavoriteAlbumResource;
use App\Models\FavoriteAlbum;

class FavoriteAlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return FavoriteAlbumResource::collection(FavoriteAlbum::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFavoriteAlbumRequest $request)
    {
        $favoriteAlbum = FavoriteAlbum::create($request->validated());

        return FavoriteAlbumResource::make($favoriteAlbum);
    }

    /**
     * Display the specified resource.
     */
    public function show(FavoriteAlbum $favoriteAlbum)
    {
        return FavoriteAlbumResource::make($favoriteAlbum);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFavoriteAlbumRequest $request, FavoriteAlbum $favoriteAlbum)
    {
        $favoriteAlbum->update($request->validated());

        return FavoriteAlbumResource::make($favoriteAlbum);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FavoriteAlbum $favoriteAlbum)
    {
        $favoriteAlbum->delete();

        return response()->noContent();
    }
}

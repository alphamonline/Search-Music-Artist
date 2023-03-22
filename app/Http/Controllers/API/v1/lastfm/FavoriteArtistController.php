<?php

namespace App\Http\Controllers\API\v1\lastfm;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFavoriteArtistRequest;
use App\Http\Requests\UpdateFavoriteArtistRequest;
use App\Http\Resources\FavoriteArtistResource;
use App\Models\FavoriteArtist;

class FavoriteArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return FavoriteArtistResource::collection(FavoriteArtist::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFavoriteArtistRequest $request)
    {
        $favoriteArtist = FavoriteArtist::create($request->validated());

        return FavoriteArtistResource::make($favoriteArtist);
    }

    /**
     * Display the specified resource.
     */
    public function show(FavoriteArtist $favoriteArtist)
    {
        return FavoriteArtistResource::make($favoriteArtist);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFavoriteArtistRequest $request, FavoriteArtist $favoriteArtist)
    {
        $favoriteArtist->update($request->validated());

        return FavoriteArtistResource::make($favoriteArtist);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FavoriteArtist $favoriteArtist)
    {
        $favoriteArtist->delete();

        return response()->noContent();
    }
}

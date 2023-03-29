<?php

namespace App\Http\Controllers\API\v1\lastfm;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFavoriteArtistRequest;
use App\Http\Requests\UpdateFavoriteArtistRequest;
use App\Models\FavoriteArtist;
use App\Services\FavoriteArtistService;
use Illuminate\Http\Request;

class FavoriteArtistController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(FavoriteArtist::class, 'favorite-artists');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, FavoriteArtistService $favoriteArtistService)
    {
        return $favoriteArtistService->getFavoriteArtist($request);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFavoriteArtistRequest $request, FavoriteArtistService $favoriteArtistService)
    {
        return $favoriteArtistService->createFavoriteArtist($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(FavoriteArtist $favoriteArtist, Request $request, FavoriteArtistService $favoriteArtistService)
    {
        return $favoriteArtistService->getCurrentFavoritArtist($favoriteArtist, $request);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFavoriteArtistRequest $request, FavoriteArtist $favoriteArtist, FavoriteArtistService $favoriteArtistService)
    {
        return $favoriteArtistService->updateFavoriteArtist($request, $favoriteArtist);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FavoriteArtist $favoriteArtist, Request $request, FavoriteArtistService $favoriteArtistService)
    {
        return $favoriteArtistService->deleteFavoriteArtist($favoriteArtist, $request);
    }
}

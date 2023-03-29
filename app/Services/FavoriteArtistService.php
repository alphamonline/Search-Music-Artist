<?php

namespace App\Services;

use App\Http\Requests\StoreFavoriteArtistRequest;
use App\Http\Requests\UpdateFavoriteArtistRequest;
use App\Http\Resources\FavoriteArtistResource;
use App\Models\FavoriteArtist;
use Illuminate\Http\Request;

class FavoriteArtistService
{
    public function getFavoriteArtist(Request $request)
    {
        $user = $request->user();

        // Get favorite albums based on the current user
        return FavoriteArtistResource::collection(FavoriteArtist::where('user_id', $user->id)->orderBy('created_at', 'DESC')->paginate(10));
    }

    public function createFavoriteArtist(StoreFavoriteArtistRequest $request)
    {
        $favoriteArtist = FavoriteArtist::create($request->validated());

        return FavoriteArtistResource::make($favoriteArtist);
    }

    public function getCurrentFavoritArtist(FavoriteArtist $favoriteArtist, Request $request)
    {
        $user = $request->user();

        // Check if current user is owner
        if ($user->id !== $favoriteArtist->user_id) {
            return abort(403, 'Unauthorized action.');
        }

        return FavoriteArtistResource::make($favoriteArtist);
    }

    public function updateFavoriteArtist(UpdateFavoriteArtistRequest $request, FavoriteArtist $favoriteArtist)
    {
        $favoriteArtist->update($request->validated());

        return FavoriteArtistResource::make($favoriteArtist);
    }

    public function deleteFavoriteArtist(FavoriteArtist $favoriteArtist, Request $request)
    {

        $user = $request->user();

        // Check if current user is owner
        if ($user->id !== $favoriteArtist->user_id) {
            return abort(403, 'Unauthorized action.');
        }

        $favoriteArtist->delete();

        return response('', 204);
    }
}

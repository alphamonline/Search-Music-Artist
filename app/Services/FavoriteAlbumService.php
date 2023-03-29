<?php

namespace App\Services;

use App\Http\Requests\StoreFavoriteAlbumRequest;
use App\Http\Requests\UpdateFavoriteAlbumRequest;
use App\Http\Resources\FavoriteAlbumResource;
use App\Models\FavoriteAlbum;
use Illuminate\Http\Request;

class FavoriteAlbumService
{
    public function getFavoriteAlbums(Request $request)
    {
        $user = $request->user();

        return FavoriteAlbumResource::collection(FavoriteAlbum::where('user_id', $user->id)->orderBy('created_at', 'DESC')->paginate(10));
    }

    public function createFavoriteAlbum(StoreFavoriteAlbumRequest $request)
    {
        $favoriteAlbum = FavoriteAlbum::create($request->validated());

        return FavoriteAlbumResource::make($favoriteAlbum);
    }

    public function getCurrentFavoriteAlbum(FavoriteAlbum $favoriteAlbum, Request $request)
    {
        $user = $request->user();

        // Check if current user is owner
        if ($user->id !== $favoriteAlbum->user_id) {
            return abort(403, 'Unauthorized action.');
        }

        return FavoriteAlbumResource::make($favoriteAlbum);
    }

    public function updateFavoriteAlbum(UpdateFavoriteAlbumRequest $request, FavoriteAlbum $favoriteAlbum)
    {
        $favoriteAlbum->update($request->validated());

        return FavoriteAlbumResource::make($favoriteAlbum);
    }

    public function deleteFavoriteAlbum(FavoriteAlbum $favoriteAlbum, Request $request)
    {
        $user = $request->user();

        // Check if current user is owner
        if ($user->id !== $favoriteAlbum->user_id) {
            return abort(403, 'Unauthorized action.');
        }

        $favoriteAlbum->delete();

        return response('', 204);
    }
}

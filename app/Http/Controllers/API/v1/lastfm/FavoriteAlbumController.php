<?php

namespace App\Http\Controllers\API\v1\lastfm;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFavoriteAlbumRequest;
use App\Http\Requests\UpdateFavoriteAlbumRequest;
use App\Http\Resources\FavoriteAlbumResource;
use App\Models\FavoriteAlbum;
use Illuminate\Http\Request;

class FavoriteAlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        // Get favorite albums based on the current user
        return FavoriteAlbumResource::collection(FavoriteAlbum::where('user_id', $user->id)->orderBy('created_at', 'DESC')->paginate(10));
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
    public function show(FavoriteAlbum $favoriteAlbum, Request $request)
    {
        $user = $request->user();

        // Check if current user is owner
        if ($user->id !== $favoriteAlbum->user_id) {
            return abort(403, 'Unauthorized action.');
        }

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
    public function destroy(FavoriteAlbum $favoriteAlbum, Request $request)
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

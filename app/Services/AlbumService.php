<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AlbumService
{
    public function getAlbums($name)
    {
        try {
            return Http::get(config('app.lastfm_api_root').'?method=album.search&album='.$name.'&api_key='.config('app.lastfm_api_key').'&format=json');

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong trying to show this user record!',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function getCurrentAlbum($artist, $name)
    {
        try {
            return Http::get(config('app.lastfm_api_root').'?method=album.getinfo&api_key='.config('app.lastfm_api_key').'&artist='.$artist.'&album='.$name.'&format=json');

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong trying to show this user record!',
                'error' => $e->getMessage(),
            ], 400);
        }
    }
}

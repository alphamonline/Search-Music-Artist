<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AlbumService
{
    const LASTFM_API_ROOT = 'http://ws.audioscrobbler.com/2.0/';
    const LASTFM_API_KEY = '84b91468af220bf3fde02128f6f179be';
    public function getAlbums($name)
    {
        try {
            return Http::get(self::LASTFM_API_ROOT.'?method=album.search&album='.$name.'&api_key='.self::LASTFM_API_KEY.'&format=json');

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
            return Http::get(self::LASTFM_API_ROOT.'?method=album.getinfo&api_key='.self::LASTFM_API_KEY.'&artist='.$artist.'&album='.$name.'&format=json');

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong trying to show this user record!',
                'error' => $e->getMessage(),
            ], 400);
        }
    }
}

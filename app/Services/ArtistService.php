<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ArtistService
{
    const LASTFM_API_ROOT = 'http://ws.audioscrobbler.com/2.0/';
    const LASTFM_API_KEY = '84b91468af220bf3fde02128f6f179be';

    public function getArtists($name)
    {
        try {
            return Http::get(self::LASTFM_API_ROOT.'?method=artist.search&artist='.$name.'&api_key='.self::LASTFM_API_KEY.'&format=json');

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong trying to show this user record!',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function getCurrentArtist($name)
    {
        try {
            return Http::get(self::LASTFM_API_ROOT.'?method=artist.getinfo&artist='.$name.'&api_key='.self::LASTFM_API_KEY.'&format=json');

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong trying to show this user record!',
                'error' => $e->getMessage(),
            ], 400);
        }
    }
}

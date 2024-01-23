<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ArtistService
{
    public function getArtists($name)
    {
        try {
            return Http::get(config('app.lastfm_api_root').'?method=artist.search&artist='.$name.'&api_key='.config('app.lastfm_api_key').'&format=json');

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
            return Http::get(config('app.lastfm_api_root').'?method=artist.getinfo&artist='.$name.'&api_key='.config('app.lastfm_api_key').'&format=json');

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong trying to show this user record!',
                'error' => $e->getMessage(),
            ], 400);
        }
    }
}

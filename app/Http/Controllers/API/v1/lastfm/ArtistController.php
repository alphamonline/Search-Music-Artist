<?php

namespace App\Http\Controllers\API\v1\lastfm;

use App\Http\Controllers\Controller;
use App\Services\ArtistService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ArtistController extends Controller
{
    /**
     * Get Artists by name.
     */
    public function searchArtists($name)
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

    /**
     * Get Current Artist.
     */
    public function currentArtist($name)
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

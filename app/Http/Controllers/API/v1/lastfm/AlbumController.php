<?php

namespace App\Http\Controllers\API\v1\lastfm;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class AlbumController extends Controller
{
    /**
     * Get Albums by name.
     */
    public function searchAlbums($name)
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

    /**
     * Get Current Album.
     */
    public function currentAlbum($artist, $name)
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

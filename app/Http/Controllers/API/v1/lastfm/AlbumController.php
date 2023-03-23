<?php

namespace App\Http\Controllers\API\v1\lastfm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AlbumController extends Controller
{

    public function searchAlbums(Request $request, $name)
    {
        try {
            $artist = $name;

            return $response = Http::get(self::LASTFM_API_ROOT.'?method=album.search&album='.$artist.'&api_key='.self::LASTFM_API_KEY.'&format=json');


        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong trying to show this user record!',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

}

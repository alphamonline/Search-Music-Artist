<?php

namespace App\Http\Controllers\API\v1\lastfm;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{

    public function topAlbums()
    {
        return $response = Http::get(self::LASTFM_API_ROOT.'?method=tag.gettopalbums&tag=disco&api_key='.self::LASTFM_API_KEY.'&format=json');
    }

    public function topArtists()
    {
        return $response = Http::get(self::LASTFM_API_ROOT.'?method=tag.gettopartists&tag=disco&api_key='.self::LASTFM_API_KEY.'&format=json');
    }
}

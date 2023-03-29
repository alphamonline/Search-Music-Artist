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
    public function searchArtists(ArtistService $artistService, $name)
    {
        return $artistService->getArtists($name);
    }

    /**
     * Get Current Artist.
     */
    public function currentArtist(ArtistService $artistService, $name)
    {
        return $artistService->getCurrentArtist($name);
    }
}

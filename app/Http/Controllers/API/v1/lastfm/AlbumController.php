<?php

namespace App\Http\Controllers\API\v1\lastfm;

use App\Http\Controllers\Controller;
use App\Services\AlbumService;

class AlbumController extends Controller
{
    /**
     * Get Albums by name.
     */
    public function searchAlbums(AlbumService $albumService, $name)
    {
        return $albumService->getAlbums($name);
    }

    /**
     * Get Current Album.
     */
    public function currentAlbum(AlbumService $albumService, $artist, $name)
    {
        return $albumService->getCurrentAlbum($artist, $name);
    }

}

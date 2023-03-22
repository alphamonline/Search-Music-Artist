<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    const LASTFM_API_ROOT = 'http://ws.audioscrobbler.com/2.0/';
    const LASTFM_API_KEY = '84b91468af220bf3fde02128f6f179be';
}

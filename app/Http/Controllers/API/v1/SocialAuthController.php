<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirect($provider)
    {
//        return Socialite::driver($provider)->stateless()->redirect();
        return Socialite::driver($provider) ->setScopes(['openid', 'email'])->redirect();
    }

    public function callback($provider)
    {
        $user = Socialite::driver($provider)->stateless()->user();
        dd($user);
    }
}

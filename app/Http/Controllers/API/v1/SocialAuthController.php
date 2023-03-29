<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\SocialAccount;
use App\Models\User;
use App\Services\AuthService;
use App\Services\SocialAuthService;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirect($provider)
    {
        $url = Socialite::driver($provider)->stateless()->redirect()->getTargetUrl();

        return response()->json([
            "url" => $url
        ]);
    }

    public function callback(SocialAuthService $socialAuthService, $provider)
    {
        $appUser = $socialAuthService->getCallback($provider);
        $token = $appUser->createToken('Login token')->plainTextToken;

        return response()->json([
            'user' => $appUser,
            'token' => $token
        ]);

    }
}

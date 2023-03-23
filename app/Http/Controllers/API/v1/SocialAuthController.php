<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\SocialAccount;
use App\Models\User;
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

    public function callback($provider)
    {
        $user = Socialite::driver($provider)->stateless()->user();

        if (!$user->token) {
            //return json
            dd('failed');
        }

        $appUser = User::whereEmail($user->email)->first();

        if (!$appUser) {
            /** @var \App\Models\User $user */
            $appUser = User::create([
                'name' => $user->name,
                'email' => $user->email
            ]);

            //create social account
            $this->createSocialAccount($appUser->id, $user->id, $provider);

        } else {
            $socialAccount = $appUser->socialAccounts()->where('provider', $provider)->first();

            if (!$socialAccount) {
                //create social account
                $this->createSocialAccount($appUser->id, $user->id, $provider);
            }
        }
        //login user and create token
        $token = $appUser->createToken('Login token')->plainTextToken;
        return response()->json([
            'user' => $appUser,
            'token' => $token
        ]);

    }

    private function createSocialAccount($userId, $providerUserId, $provider)
    {
        /** @var \App\Models\SocialAccount $socialAccount */
        SocialAccount::create([
            'user_id' => $userId,
            'provider_user_id' => $providerUserId,
            'provider' => $provider,
        ]);
    }
}

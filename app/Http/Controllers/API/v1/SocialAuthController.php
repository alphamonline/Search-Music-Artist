<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\SocialAccount;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->stateless()->redirect();

    }

    public function callback($provider)
    {
        $user = Socialite::driver($provider)->stateless()->user();
        $appUser = User::whereEmail($user->email)->firstOrFail();

        if (!$user->token) {
            //return json
            dd('failed');
        }

        if (!$appUser) {
            //create user account
            /** @var \App\Models\User $user */
            $appUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => Hash::make(Str::random(8))
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
        $token = $appUser->createToken('main')->plainTextToken;
        return response()->json([
            'user' => $appUser,
            'token' => $token
        ], 200);

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

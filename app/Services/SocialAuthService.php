<?php

namespace App\Services;

use App\Models\SocialAccount;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthService
{
    public function createSocialAccount($userId, $providerUserId, $provider): SocialAccount
    {
        return SocialAccount::create([
            'user_id' => $userId,
            'provider_user_id' => $providerUserId,
            'provider' => $provider,
        ]);
    }

    public function getCallback($provider)
    {
        $user = Socialite::driver($provider)->stateless()->user();

        if (!$user->token) {
            return response()->json([
                'message' => 'Failed to authenticate!',
            ], 401);
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

        return $appUser;
    }
}

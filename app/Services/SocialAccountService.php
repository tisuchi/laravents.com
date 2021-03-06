<?php

namespace App\Services;

use App\Models\SocialAccount;
use App\Models\User;
use Laravel\Socialite\Contracts\Provider;

class SocialAccountService
{
    /**
     * @param Provider $provider
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function createOrGetUser(Provider $provider)
    {
        $providerUser = $provider->user();
        $providerName = class_basename($provider);

        $account = SocialAccount::whereProvider($providerName)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {
            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $providerName
            ]);

            if (! $providerUser->getEmail()) {
                alert()->error("You´ll need to provide your email address using your $providerName account");
            }

            if (! $providerUser->getName()) {
                alert()->error("You´ll need to provide your name using your $providerName account");
            }

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'password' => bcrypt(str_random())
                ]);
            }


            return $user;
        }
    }
}

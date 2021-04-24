<?php declare(strict_types=1);


namespace App\Services;

use App\Models\User as Model;
use Laravel\Socialite\Contracts\User;

class SocialiteService
{
    public function userLogin(User $user): void
    {
        $email = $user->getEmail();
        $userData = Model::where('email', $email)->first();
        if ($userData) {
            $userData->fill([
                'name' => $user->getName(),
                'avatar' => $user->getAvatar()
            ])->save();
            \Auth::loginUsingId($userData->id);
        }
            // TODO создать пользователя с записью в базу данных
//        if (!$userData) {
//            $emailTest = random_int(1, 1000);
//            $userData = Model::create([
//                'name' => $user->getName(),
//                'avatar' => $user->getAvatar(),
//                'email' => $emailTest . '@mail.com',
//                'password' => random_int(1, 1000),
//                'is_admin' => '1'
//            ]);
//            \Auth::loginUsingId((Model::where('email', $emailTest . '@mail.com')->first())->id);
//        }

    }
}

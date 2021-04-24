<?php

namespace App\Http\Controllers;

use App\Services\SocialiteService;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function loginVK()
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function responseVK(SocialiteService $service)
    {
        $user = Socialite::driver('vkontakte')->user();
        $service->userLogin($user);
        return redirect()->route('admin.news.index');
    }


    public function loginFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function responseFacebook(SocialiteService $service)
    {
        $user = Socialite::driver('facebook')->user();
        $service->userLogin($user);
        return redirect()->route('admin.news.index');
    }

}

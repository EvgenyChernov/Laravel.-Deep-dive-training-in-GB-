<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class AccountController extends Controller
{
    public function __invoke()
    {
        $name = Auth::check() ? Auth::user()->name : "гость ";
        return "Привет, " . $name . "<br><a href='" . route('admin.news.index') . "'> Перейти в админку</a>";
    }

}

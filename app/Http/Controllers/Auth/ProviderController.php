<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $socialUser = Socialite::driver($provider)->user();
        $user = User::where('email', '=', $socialUser->email)->first();
        if ($user) {
            Auth::login($user);
            return redirect()->intended(RouteServiceProvider::HOME);
        } else {
            return redirect('/')->withErrors(['email' => 'These credentials do not match our records.']);
        }
    }
}

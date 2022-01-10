<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use RealRashid\SweetAlert\Facades\Alert;

class LoginWithSocialNetworkController extends Controller
{
    /*
    |-------------------------------------------------------------------
    | Login with Facebook, Google.
    |-------------------------------------------------------------------
    */
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();

            $providerIdField = $provider . '_id';
            // ->orWhere('email', $user->getEmail())
            $findUser = User::where($providerIdField, $user->id)->first();
            // dd($findUser, $providerIdField);
            if (isset($findUser)) {
                Auth::guard('user')->login($findUser);
                toast(__('Welcome back.'), 'info')->position('top');

                return redirect()->intended('/');
            } else {
                $newUser = User::create([
                    $providerIdField => $user->getId(),
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'email_verified_at' => now(),
                    'profile_photo_path' =>  $user->getAvatar(),
                    'password' => encrypt('123456'),
                ]);
                Auth::guard('user')->login($newUser);
                toast(__('Welcome to website, :Name !', ['name' => $user->getName()]), 'success')->position('top');

                return redirect()->intended('/');
            }
        } catch (\Exception $e) {
            toast(__('Login failed.'), 'error')->position('top');
            return redirect()->intended('/');
        }
    }
}

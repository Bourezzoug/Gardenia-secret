<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect() {
        return Socialite::driver('google')->redirect();
    }
    public function redirectToFacebook() {
        return Socialite::driver('facebook')->redirect();
    }
    public function callbackGoogle() {
        try {
            $google_user = Socialite::driver('google')->user();
            $user = User::where('google_id',$google_user->getId())
                    ->where('social_type','Google')
                    ->first();

            if(!$user) {
                $new_user = User::create([
                    'name'          =>  $google_user->getName(),
                    'email'         =>  $google_user->getEmail(),
                    'social_type'   =>  'Google',
                    'google_id'     =>  $google_user->getId()
                ]);

                Auth::login($new_user);

                return redirect()->to('client/dashboard');
            }

            else{
                Auth::login($user);
                return redirect()->to('client/dashboard');
            }
        }
        catch(\Throwable $th) {
            return redirect()->back()->with('already-registered','Your already registred with this Email');
        }
    }
    public function callbackFacebook() {
        try {
            $facebook_user = Socialite::driver('facebook')->user();
            $user = User::where('facebook_id',$facebook_user->getId())
                        ->where('social_type','Facebook')
                        ->first();

            if(!$user) {
                $new_user = User::create([
                    'name'          =>  $facebook_user->getName(),
                    'email'         =>  $facebook_user->getEmail(),
                    'social_type'   =>  'Facebook',
                    'facebook_id'   =>  $facebook_user->getId()
                ]);

                Auth::login($new_user);

                return redirect()->to('client/dashboard');
            }

            else{
                Auth::login($user);
                return redirect()->to('client/dashboard');
            }
        }
        catch(\Throwable $th) {
            dd($th);
        }
    }
}

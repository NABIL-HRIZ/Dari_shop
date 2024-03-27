<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class GoogleController extends Controller
{
    public function googlePage()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackPage(Request $request)
    {
        try {
            $user = Socialite::driver('google')->user();
            $findUser = User::where('google_id', $user->id)->first();

            if ($findUser) {
                Auth::login($findUser);
                return redirect()->intended('/home');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone' => null,
                    'address' => null,
                    'user_type' => '0',
                    'email_verified_at' => now(), // Use Laravel's now() function
                    'google_id' => $user->id,
                    'password' => bcrypt('123456789'), // Use Laravel's bcrypt() function
                ]);
                Auth::login($newUser);
                return redirect()->intended('/home');
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}

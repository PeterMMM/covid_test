<?php
namespace App\Http\Controllers\Auth;

namespace App\Http\Controllers;
use Socialite;
use Auth;
use Exception;
use App\User;
use Illuminate\Support\Facades\Hash;

use Google_Client;
use Google_Service_PeopleService;

use Illuminate\Http\Request;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')
            ->scopes(['openid', 'profile', 'email'])
            ->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id',$user->id)->first();
            if ($finduser) {
                Auth::login($finduser);
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => Hash::make('passwordnotset'),
                ]);
                Auth::login($newUser);
            }
            return redirect('/home');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}

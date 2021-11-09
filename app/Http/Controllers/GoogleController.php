<?php
namespace App\Http\Controllers\Auth;

namespace App\Http\Controllers;
use Socialite;
use Auth;
use Exception;
use App\User;
use App\Contact;
use Illuminate\Support\Facades\Hash;

use Google_Client;
use Google_Service_PeopleService;

use Illuminate\Http\Request;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')
            ->scopes(['openid', 'profile', 'email', Google_Service_PeopleService::CONTACTS_READONLY])
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
            // Set token for the Google API PHP Client
            $google_client_token = [
                'access_token' => $user->token,
                'refresh_token' => $user->refreshToken,
                'expires_in' => $user->expiresIn
            ];
            $client = new Google_Client();
            $client->setApplicationName("Laravel");
            $client->setDeveloperKey(env('GOOGLE_SERVER_KEY'));
            $client->setAccessToken(json_encode($google_client_token));

            $service = new Google_Service_PeopleService($client);
            $optParams = array('requestMask.includeField' => 'person.phone_numbers,person.names,person.email_addresses');
            $results = $service->people_connections->listPeopleConnections('people/me',$optParams);

            $contacts = array();

            if (count($results->getConnections()) > 0) {
              foreach ($results->getConnections() as $person) {
                if (count($person->getNames()) > 0) {
                  $names = $person->getNames();
                  $name = $names[0];
                  $contacts[] = $name->getDisplayName();
                  $newContact = Contact::firstOrCreate(array('name' => $name->getDisplayName(),'user_id'=>Auth::user()->id));
                  $newContact->name = $name->getDisplayName();
                  $newContact->user_id = Auth::user()->id;
                  $newContact->save();
                
                }
              }
            }
            return redirect('/home');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}

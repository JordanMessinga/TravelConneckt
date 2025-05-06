<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use GuzzleHttp\Promise\Create;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function googleLogin(){
        return Socialite::driver('google')->redirect();
    }

    public function googleAuthentification(){

        try{

            $googleUser = Socialite::driver('google')->user();

            $user = User::where('google_id', $googleUser->id)->first();
    
            if ($user){
                Auth::login($user);
                return redirect(route('home'));
            } else {
                    $userData = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'password' => Hash::make('password0611'),
                    'google_id' => $googleUser->id,
                ]);
                    
                if ($userData){
                    Auth::login($userData);
                    return redirect(route('home'));
                }
            }

        } catch (Exception $e){
            dd($e);
        }

       

        
        }
}

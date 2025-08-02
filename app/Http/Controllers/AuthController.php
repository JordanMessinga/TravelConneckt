<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showSign_up()
    {
        return view("auth.sign_up");
    }
   
    public function showLogin()
    {
        $cities = City::all();
        return view("auth.login", ["cities"=>$cities]);
    }

    public function Sign_up(Request $request)
    {
     $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'required|numeric|min:9',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = new User(); //= User::create($validated);
        $user->name = $request->name; 
        $user->email = $request->email; 
        $user->phone = $request->phone; 
        $user->password = $request->password;
        $user->id_role = 1;

        $user->save();

        Auth::login($user);

        return redirect()->route('home');
    }


   
    public function Login(Request $request)
    {
        $request->validate([
            'email'=> 'email|required',
            'password'=>'string|required'
        ]) ;
        $credentials = ['email'=> $request->email,'password'=> $request->password];
        if(Auth::attempt($credentials)){
        
            return redirect()->route('home');
        }else{
            return back()->withErrors(["message"=>'invalid password or email']);

        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }

    public function admin_panel(){

    }

    public function show_reservations(){
        $cities = City::all();
        return view('reservations',["cities"=>$cities]);
    }
}
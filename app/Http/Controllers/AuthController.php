<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function index(){
        if(Auth::check()){
            return redirect(url("/contact"));
        }
        return view("login");
    }

    public function login(Request $request){

        $request->validate([
            "email" => ["required","email"],
            "password" => "required",
        ]);


        $user = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ],true);

        if(!$user){
            return Redirect::back()->withErrors([
                "These credentials do not match our records."
            ]);
        }

        return redirect(url("/contact"));

    }

    public function logout(){

        Auth::logout();
        return redirect(url('/user/signIn'));
    }
}

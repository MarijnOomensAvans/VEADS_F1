<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AuthController extends Controller
{
    public function login(){
        return view('front.auth.login');
    }

    public function loginPost(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/');
        }

        return redirect()->back()->with('error', 'E-mailadres of wachtwoord niet geldig');   
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function profile(){
        if(Auth::check()){
            return view('front.profile');
        }
        else{
            return redirect('/login');
        }
    }
}

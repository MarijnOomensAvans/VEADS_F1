<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use App\User;
use App\Address;
use App\Volunteer;

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

    public function saveProfile(Request $request){
        $this->handleUserFields($request);
        \Session::flash('success',true);
        return view('front.profile')->with('success', true);
    }

    public function register(){
        return view('front.auth.register');
    }

    public function saveRegister(Request $request){
        $this->handleUserFields($request);
        \Session::flash('success',true);
        return view('front.profile')->with('success', true);
    }

    /**
     * Function that handles the users field
     * Create new user if doesn't exists or update existing one
     *
     * @param Request $request
     */
    public static function handleUserFields(Request $request){
        
        // add firstname as name
        $request['name'] = $request->input('first_name');

        // create the user if person is guest and login
        if(Auth::guest())
        {
            // validate user settig
            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'repeat_password' => 'required|same:password'
            ]);

            $validated["password"] = Hash::make($validated["password"]);

            // create user
            $user = User::create($validated);

            // login as user
            auth()->login($user);
        }

        // add userid to request
        $request['user_id'] = Auth::user()->id;

        // validate volunteer request
        $requestVolunteer = app('App\Http\Requests\StoreVolunteer');

        // update or insert the address
        $address = empty(Auth::user()->volunteer->address) ? new Address : Auth::user()->volunteer->address;
        $address->fill($requestVolunteer->all());
        $address->save();

        // add address id to request
        $request['address_id'] = $address->id;

        // update or insert the address
        $volunteer = empty(Auth::user()->volunteer) ? new Volunteer : Auth::user()->volunteer;
        $volunteer->fill($request->all());
        $volunteer->save();

        return $volunteer;
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use App\User;
use App\Address;
use App\Volunteer;
use Illuminate\Support\Facades\Auth;

class WinWinController extends Controller
{
    public function index() {
        return view('front/winwin');
    }

    public function enrollVolunteer() {
        $events = Event::get();
        return view('front.win-win.enrollVolunteer', ['events' => $events ]);
    }

    public function saveEnrollVolunteer(Request $request) {

        // TODO: Split register logic to other controller

        // add firstname as name
        $firstName = $request->input('first_name');
        $request['name'] = $firstName;

        // create the user if person is guest
        if(Auth::guest())
        {
            // validate user settig
            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'repeat_password' => 'required|same:password'
            ]);

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
        if (empty(Auth::user()->volunteer) || empty(Auth::user()->volunteer->address)){
            $address = new Address;
        }else{
            $address = Auth::user()->volunteer->address;
        }
        $address->fill($requestVolunteer->all());
        $address->save();

        // create the volenteer
        $request['address_id'] = $address->id;

        // update or insert the address
        if (empty(Auth::user()->volunteer) || empty(Auth::user()->volunteer->address)){
            $volunteer = new Volunteer;
        }else{
            $volunteer = Auth::user()->volunteer;
        }
        $volunteer->fill($request->all());
        $volunteer->save();

        // thankyou page
        return redirect('/thanks');
    }

}
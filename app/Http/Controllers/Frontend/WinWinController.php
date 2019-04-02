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

        $this->handleUserFields($request);

        // validate event
        $validated = $request->validate([
            'event_id' => 'required'
        ], [], [
            'event_id' => 'event'
        ]);

        // TODO: add user to event

        // thankyou page
        return redirect('/thanks');
    }


    /**
     * Function that handles the users field
     * Create new user if doesn't exists or update existing one
     *
     * @param Request $request
     */
    private function handleUserFields(Request $request){
        
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
    }

}
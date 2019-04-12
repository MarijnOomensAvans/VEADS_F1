<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\AuthController;
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

    public function giveProducts() {
        return view('front.win-win.giveProducts');
    }


    public function saveEnrollVolunteer(Request $request) {

        $volunteer = AuthController::handleUserFields($request);

        // validate event
        $validated = $request->validate([
            'event_id' => 'required'
        ], [], [
            'event_id' => 'event'
        ]);

        // get event
        $event = Event::find($request->input("event_id"));

        // return error if already init
        if ($volunteer->events->contains($event)){
            return back()->withErrors('Je hebt je al ingeschreven voor dit evenement!');
        }

        // attack to the event
        $volunteer->events()->attach($event);

        // thankyou page
        return redirect('/thanks');
    }

}
<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\AuthController;
use App\Event;
use App\DonatedProduct;
use App\Address;
use App\Volunteer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class WinWinController extends Controller
{
    public function index() {
        return view('front/winwin');
    }

    public function enrollFromPage(Request $request) {
        return $this->enrollVolunteer($request['eventid']);
    }

    public function enrollVolunteer($selectedevent = null) {
        $events = Event::leftJoin('event_date_times', 'events.id', '=', 'event_date_times.event_id')
            ->orderBy('event_date_times.start')
            ->where(function($query) {
                $query->where('event_date_times.start')
                    ->orWhere('event_date_times.start', '>', Carbon::now());
            })
            ->select('events.*')
            ->get();

        return view('front.win-win.enrollVolunteer', compact('events', 'selectedevent'));
    }

    public function giveProducts() {
        return view('front.win-win.giveproducts');
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
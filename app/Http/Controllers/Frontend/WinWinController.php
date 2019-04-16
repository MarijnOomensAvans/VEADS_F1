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
        $events = Event::get();
        return view('front.win-win.giveProducts', ['events' => $events ]);
    }

    public function saveGivenProducts(Request $request) {

        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'product_name' => 'required',
            'product_description' => 'required'
        ]);

        $product = new DonatedProduct();

        $product->name = $request['product_name'];
        $product->description = $request['product_description'];
        $product->name = $request['product_name'];
        $product->quantity = $request['quantity'];
        $product->lend = $request['donationchoice'];
        $product->first_name = $request['first_name'];
        $product->last_name = $request['last_name'];
        $product->email = $request['email'];

        $product->save();


        //Thank you page
        return redirect('/thanks');
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
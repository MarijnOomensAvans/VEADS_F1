<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;

class EventController extends Controller
{
    public function frontIndex(){
        $events = Event::paginate(9);
        return view('front.events', ['events' => $events]);
    }

    public function frontShow(Request $request, $id){
        return view('front.event', ['event' => Event::find($id)]);
    }
}

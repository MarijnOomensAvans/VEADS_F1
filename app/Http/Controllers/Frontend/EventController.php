<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;

class EventController extends Controller
{
    public function frontIndex(){
        $events = Event::leftJoin('addresses', 'events.address_id', '=', 'addresses.id')
            ->leftJoin('event_date_times', 'events.id', '=', 'event_date_times.event_id')
            ->where('events.published', '=', '1')
            ->orderBy('event_date_times.start', 'desc')
            ->select('events.*');

        $events = $events->paginate(9);
        return view('front.events', compact('events'));
    }

    public function frontShow(Request $request, $id){
        $event = Event::find($id);

        if (!$event->published) {
            return abort(403);
        }

        return view('front.event', ['event' => $event]);
    }

    public function searchShow(Request $request) {
        $name = $request->q;

        $events = Event::leftJoin('addresses', 'events.address_id', '=', 'addresses.id')
            ->leftJoin('event_date_times', 'events.id', '=', 'event_date_times.event_id')
            ->where('events.published', '=', '1')
            ->where('name','LIKE','%' . $name . '%')
            //TODO or where tags are matchin search
            ->orderBy('event_date_times.start', 'desc')
            ->select('events.*');

        $events = $events->paginate(9);

        return view('front.searchevents', compact('events'));
    }
}

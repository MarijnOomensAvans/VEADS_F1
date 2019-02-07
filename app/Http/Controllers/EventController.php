<?php

namespace App\Http\Controllers;

use App\Address;
use App\Event;
use App\EventDateTime;
use App\Http\Requests\StoreEvent;
use Illuminate\Http\Request;

class EventController extends Controller
{
	public function __construct() {
		$this->middleware("auth");
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$q = $request->query('q');

    	$events = Event::leftJoin('addresses', 'events.address_id', '=', 'addresses.id')
		    ->leftJoin('event_date_times', 'events.id', '=', 'event_date_times.event_id')
		    ->orderBy('event_date_times.start')
	        ->select('events.*');

    	if (!empty($q)) {
		    $events = $events->where('name', 'like', '%' . $q . '%')
			    ->orWhere('addresses.city', 'like', '%' . $q . '%')
			    ->paginate(15);
	    } else {
		    $events = $events->paginate(15);
	    }

        return view('events/index', compact('events', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEvent $request)
    {
        $validated = $request->validated();

        $address = new Address();
        $address->street = $validated['street'];
        $address->number = $validated['number'];
        $address->number_modifier = $validated['number_modifier'] ?? '';
        $address->zipcode = $validated['zipcode'];
        $address->city = $validated['city'];
        $address->country = $validated['country'];

        $address->save();

        $event = new Event();
        $event->address_id = $address->id;
        $event->name = $validated['name'];
        $event->description = $validated['description'];
        $event->price = $validated['price'];

        $event->save();

	    $date = new EventDateTime();
	    $date->event_id = $event->id;
	    $date->start = \DateTime::createFromFormat('U', strtotime($validated['start_date'] . " " . $validated['start_time']));
	    $date->end = \DateTime::createFromFormat('U', strtotime($validated['end_date'] . " " . $validated['end_time']));

	    $date->save();

        return redirect('admin/events/' . $event->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('events/show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Address;
use App\Event;
use App\EventDateTime;
use App\Http\Requests\StoreEvent;
use App\Picture;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{

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
    	    $events = $events->where(function($query) use ($q) {
                $query->where('name', 'like', '%' . $q . '%')
                    ->orWhere('addresses.country', 'like', '%' . $q . '%')
                    ->orWhere('addresses.city', 'like', '%' . $q . '%')
                    ->orWhere('addresses.street', 'like', '%' . $q . '%');
            });
        }

    	if ($request->has('published')) {
    	    $events = $events->where('events.published', (bool) $request->get('published'));
        }

        $events = $events->paginate(15);

    	if ($request->query('json')) {
    	    return response()->json(compact('events', 'q'));
        }

        return view('back.events.index', compact('events', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.events.create');
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

        if (
            (isset($validated['street']) && !empty($validated['street'])) &&
            (isset($validated['number']) && !empty($validated['number'])) &&
            (isset($validated['zipcode']) && !empty($validated['zipcode'])) &&
            (isset($validated['city']) && !empty($validated['city'])) &&
            (isset($validated['country']) && !empty($validated['country']))
        ) {
            $address = new Address($validated);
            $address->save();
        }

        $event = new Event($validated);

        if (!isset($validated['published'])) {
            $event->published = 0;
        }

        if (isset($address)) {
            $event->address_id = $address->id;
        }

        if ($validated['project_id'] == 0) {
            $event->project_id = null;
        }

        $event->save();

        if (isset($validated['start_datetime']) || isset($validated['end_datetime'])) {
            $date = new EventDateTime();
            $date->event_id = $event->id;

            if (isset($validated['start_datetime'])) {
                $date->start = new Carbon($validated['start_datetime']);
            }

            if (isset($validated['end_datetime'])) {
                $date->end = new Carbon($validated['end_datetime']);
            }

            $date->save();
        }

        // add tags to event
        if(isset($request['tags'])) {
            $tags = $request['tags'];
            $tagsArrayString = explode(', ', $tags);
            
            $event->tags()->detach();
            foreach ($tagsArrayString as $tag) {
                $event->tags()->create([ 'name' => $tag ]);
            }
        }


        if ($request->hasFile('image')) {
            $this->saveImages($event, $request->file('image'));
        }

        return redirect('admin/events/' . $event->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Event $event)
    {
        if ($request->get('json', false)) {
            return $event;
        }

        return view('back.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('back.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEvent $request, Event $event)
    {
        $validated = $request->validated();

        $address = $event->address()->first();

        if (
            (isset($validated['street']) && !empty($validated['street'])) &&
            (isset($validated['number']) && !empty($validated['number'])) &&
            (isset($validated['zipcode']) && !empty($validated['zipcode'])) &&
            (isset($validated['city']) && !empty($validated['city'])) &&
            (isset($validated['country']) && !empty($validated['country']))
        ) {
            if (empty($address)) {
                $address = new Address();
            }

            $address->fill($validated);
            $address->save();

            $event->address_id = $address->id;
        } elseif (!empty($address)) {
            $event->address_id = null;
            $event->save();
            $address->delete();
        }

        $event->fill($validated);

        if (!isset($validated['published'])) {
            $event->published = 0;
        }

        if ($validated['project_id'] == 0) {
            $event->project_id = null;
        }

	    $event->save();

	    $date = $event->datetime()->first();

        if (isset($validated['start_datetime']) || isset($validated['end_datetime'])) {
            if (empty($date)) {
                $date = new EventDateTime();
            }

            $date->event_id = $event->id;

            if (isset($validated['start_datetime'])) {
                $date->start = new Carbon($validated['start_datetime']);
            }

            if (isset($validated['end_datetime'])) {
                $date->end = new Carbon($validated['end_datetime']);
            }

            $date->save();
        } elseif (!empty($date)) {
            $date->delete();
        }

       // add tags to event
        if(isset($request['tags'])) {
            $tags = $request['tags'];
            $tagsArrayString = explode(', ', $tags);
            
            $event->tags()->detach();
            foreach ($tagsArrayString as $tag) {
                $event->tags()->create([ 'name' => $tag ]);
            }
        }

        if ($request->hasFile('image')) {
            $this->saveImages($event, $request->file('image'));
        }

	    return redirect('admin/events/' . $event->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        return view('back.events.destroy', compact('event'));
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \App\Event  $event
	 * @return \Illuminate\Http\Response
	 */
    public function delete(Request $request, Event $event) {
    	if (!empty($confirm = $request->post('confirm')) && $confirm == 1) {
    	    $pictures = $event->pictures;

            $event->pictures()->detach();

            foreach($pictures as $picture) {
                Storage::delete("images/" . $picture->path);
                $picture->delete();
            }

            $event->volunteers()->detach();
            $event->datetime()->delete();
            $event->delete();
		    $event->address()->delete();
	    }

	    return redirect('admin/events');
    }

    public function destroyImage(Event $event, Picture $picture) {
        return view('events/image', compact('event', 'picture'));
    }

    public function deleteImage(Request $request, Event $event, Picture $picture) {
        if (!empty($confirm = $request->post('confirm')) && $confirm == 1) {
            Storage::delete("images/" . $picture->path);
            $picture->events()->detach();
            $picture->delete();
        }

        return redirect('admin/events/' . $event->id);
    }

    public function showFeatured() {
        $events = Event::whereNotNull('featured_position')->orderBy('featured_position', 'asc')->limit(3)->get();

        return view('back.events.featured', compact('events'));
    }

    public function storeFeatured(Request $request) {
        $positions = $request->post('position');

        if (!is_array($positions)) {
            return redirect('admin/events/featured');
        }

        foreach($positions as $index => $position) {
            if (empty($position)) {
                continue;
            }

            DB::table('events')->where('featured_position', '=', $index)->update(['featured_position' => null]);

            $event = Event::find($position);

            $event->featured_position = $index;
            $event->save();
        }

        return redirect('admin/events/featured');
    }

    private function saveImages(Event $event, $images) {
        foreach($images as $image) {
            $name = $image->getClientOriginalName();
            $filename = $image->hashName();
            $image->storeAs('images', $filename);

            $picture = new Picture();
            $picture->name = $name;
            $picture->path = $filename;
            $picture->date = \DateTime::createFromFormat('U', $image->getCTime());
            $picture->save();

            $event->pictures()->attach($picture->id);
        }
    }
}

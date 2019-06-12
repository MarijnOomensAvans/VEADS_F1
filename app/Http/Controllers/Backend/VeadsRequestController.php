<?php

namespace App\Http\Controllers\Backend;

use App\Event;
use App\Http\Requests\StoreVeadsRequestRequest;
use App\VeadsRequest;
use App\VeadsResponse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VeadsRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->query('q');

        $requests = VeadsRequest::orderBy('created_at', 'desc');

        if (!empty($q)) {
            $requests = $requests->where('title', 'like', "%$q%");
        }

        $requests = $requests->paginate(15);

        return view('back.veads_requests.index', compact('requests', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = Event::leftJoin('event_date_times', 'events.id', '=', 'event_date_times.event_id')
            ->where('event_date_times.end', '>=', Carbon::now())
            ->orWhereNull('event_date_times.end')
            ->orderBy('event_date_times.start', 'desc')
            ->get(array('events.*'));

        return view('back.veads_requests.create', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVeadsRequestRequest $request)
    {
        $validated = $request->validated();

        if (isset($validated['project_id']) && $validated['project_id'] < 1) {
            unset($validated['project_id']);
        }

        if (isset($validated['event_id']) && $validated['event_id'] < 1) {
            unset($validated['event_id']);
        }

        $veadsRequest = new VeadsRequest($validated);
        $veadsRequest->save();

        return redirect(action('Backend\VeadsRequestController@show', compact('veadsRequest')));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VeadsRequest  $veadsRequest
     * @return \Illuminate\Http\Response
     */
    public function show(VeadsRequest $veadsRequest)
    {
        return view('back.veads_requests.show', ['request' => $veadsRequest]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VeadsRequest  $veadsRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(VeadsRequest $veadsRequest)
    {
        $events = Event::leftJoin('event_date_times', 'events.id', '=', 'event_date_times.event_id')
            ->where('event_date_times.end', '>=', Carbon::now())
            ->orWhereNull('event_date_times.end')
            ->orderBy('event_date_times.start', 'desc')
            ->get(array('events.id', 'events.name'));

        return view('back.veads_requests.edit', ['request' => $veadsRequest], compact('events'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VeadsRequest  $veadsRequest
     * @return \Illuminate\Http\Response
     */
    public function update(StoreVeadsRequestRequest $request, VeadsRequest $veadsRequest)
    {
        $validated = $request->validated();

        if (isset($validated['project_id']) && $validated['project_id'] < 1) {
            $validated['project_id'] = null;
        }

        if (isset($validated['event_id']) && $validated['event_id'] < 1) {
            $validated['event_id'] = null;
        }

        $veadsRequest->fill($validated);
        $veadsRequest->save();

        return redirect(action('Backend\VeadsRequestController@show', compact('veadsRequest')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VeadsRequest  $veadsRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(VeadsRequest $veadsRequest)
    {
        $veadsRequest->responses()->delete();
        $veadsRequest->delete();

        return redirect(action('Backend\VeadsRequestController@index'));
    }

    public function response(VeadsResponse $veadsResponse) {
        return view('back.veads_requests.response', ['response' => $veadsResponse]);
    }
}

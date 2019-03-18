<?php

namespace App\Http\Controllers\Backend;

use App\Address;
use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVolunteer;
use App\Project;
use App\Volunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->query('q');

        $volunteers = Volunteer::leftJoin('addresses', 'volunteers.address_id', '=', 'addresses.id')
            ->orderBy('volunteers.last_name')
            ->select('volunteers.*');

        if (!empty($q)) {
            $volunteers = $volunteers->where('first_name', 'like', '%' . $q . '%')
                ->orWhere('last_name', 'like', '%' . $q . '%')
                ->orWhere('addresses.country', 'like', '%' . $q . '%')
                ->orWhere('addresses.city', 'like', '%' . $q . '%')
                ->orWhere('addresses.street', 'like', '%' . $q . '%');
        }

        $volunteers = $volunteers->paginate(15);

        return view('volunteers.index', compact('volunteers', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('volunteers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVolunteer $request)
    {
        $validated = $request->validated();

        $address = new Address($validated);
        $address->save();

        $volunteer = new Volunteer($validated);
        $volunteer->address_id = $address->id;
        $volunteer->save();

        return redirect('admin/volunteers/' . $volunteer->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function show(Volunteer $volunteer)
    {
        return view('volunteers.show', compact('volunteer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function edit(Volunteer $volunteer)
    {
        return view('volunteers.edit', compact('volunteer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function update(StoreVolunteer $request, Volunteer $volunteer)
    {
        $validated = $request->validated();

        $address = $volunteer->address()->first();
        $address->fill($validated);
        $address->save();

        $volunteer->fill($validated);
        $volunteer->address_id = $address->id;
        $volunteer->save();

        return redirect('admin/volunteers/' . $volunteer->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Volunteer $volunteer)
    {
        return view('volunteers.destroy', compact('volunteer'));
    }

    public function delete(Request $request, Volunteer $volunteer) {
        if (!empty($confirm = $request->post('confirm')) && $confirm == 1) {
            $volunteer->delete();
            $volunteer->address()->delete();
        }

        return redirect('admin/volunteers');
    }

    public function addProject(Volunteer $volunteer, Project $project) {
        $p = Volunteer::whereHas('projects', function($query) use ($project) {
            $query->where('id', '=', $project->id);
        })->first();

        if (empty($p)) {
            $volunteer->projects()->attach($project->id);
        }

        return redirect('admin/volunteers/' . $volunteer->id);
    }

    public function addEmptyProject(Volunteer $volunteer) {
        return redirect('admin/volunteers/' . $volunteer->id);
    }

    public function removeProject(Volunteer $volunteer, Project $project) {
        $p = Volunteer::whereHas('projects', function($query) use ($project) {
            $query->where('id', '=', $project->id);
        })->first();

        if (!empty($p)) {
            $volunteer->projects()->detach($project->id);
        }

        return redirect('admin/volunteers/' . $volunteer->id);
    }

    public function addEvent(Volunteer $volunteer, Event $event) {
        $p = Volunteer::whereHas('events', function($query) use ($event) {
            $query->where('id', '=', $event->id);
        })->first();

        if (empty($p)) {
            $volunteer->events()->attach($event->id);
        }

        return redirect('admin/volunteers/' . $volunteer->id);
    }

    public function addEmptyEvent(Volunteer $volunteer)
    {
        return redirect('admin/volunteers/' . $volunteer->id);
    }

    public function removeEvent(Volunteer $volunteer, Event $event) {
        $p = Volunteer::whereHas('events', function($query) use ($event) {
            $query->where('id', '=', $event->id);
        })->first();

        if (!empty($p)) {
            $volunteer->events()->detach($event->id);
        }

        return redirect('admin/volunteers/' . $volunteer->id);
    }
}

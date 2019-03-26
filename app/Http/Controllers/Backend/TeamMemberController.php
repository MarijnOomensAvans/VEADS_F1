<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeamMemberRequest;
use App\TeamMember;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $team_members = TeamMember::query()->orderBy('last_name', 'asc');
        $q = $request->get('q');

        if (!empty($q)) {
            $team_members = $team_members
                ->orWhere('first_name', 'like', "%$q%")
                ->orWhere('last_name', 'like', "%$q%");
        }

        $team_members = $team_members->paginate(15);

        return view('team_member.index', compact('team_members', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('team_member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeamMemberRequest $request)
    {
        $team_member = new TeamMember($request->validated());
        $team_member->save();

        return redirect(action('Backend\TeamMemberController@index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function show(TeamMember $team_member)
    {
        return view('team_member.show', compact('team_member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function edit(TeamMember $team_member)
    {
        return view('team_member.edit', compact('team_member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTeamMemberRequest $request, TeamMember $team_member)
    {
        $team_member->fill($request->validated());
        $team_member->save();

        return redirect(action('Backend\TeamMemberController@show', compact('team_member')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeamMember $team_member)
    {
        $team_member->delete();

        return redirect(action('Backend\TeamMemberController@index'));
    }
}

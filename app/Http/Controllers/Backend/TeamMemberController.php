<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeamMemberRequest;
use App\TeamMember;
use App\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        return view('back.team_member.index', compact('team_members', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.team_member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeamMemberRequest $request)
    {
        $team_member = new TeamMember($request->validated());
        $team_member->save();

        $this->saveImages($team_member, $request->file('image'));

        return redirect(action('Backend\TeamMemberController@index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TeamMember $teamMember
     * @return \Illuminate\Http\Response
     */
    public function show(TeamMember $team_member)
    {
        return view('back.team_member.show', compact('team_member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TeamMember $teamMember
     * @return \Illuminate\Http\Response
     */
    public function edit(TeamMember $team_member)
    {
        return view('back.team_member.edit', compact('team_member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\TeamMember $teamMember
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTeamMemberRequest $request, TeamMember $team_member)
    {
        $team_member->fill($request->validated());
        $team_member->save();

        $this->saveImages($team_member, $request->file('image'));

        return redirect(action('Backend\TeamMemberController@show', compact('team_member')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TeamMember $teamMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeamMember $team_member)
    {
        $team_member->delete();

        return redirect(action('Backend\TeamMemberController@index'));
    }

    public function destroyImage(TeamMember $team_member, Picture $picture)
    {
        return view('back.team_member.image', compact('team_member', 'picture'));
    }

    public function delete(Request $request, TeamMember $team_member)
    {
        if (!empty($confirm = $request->post('confirm')) && $confirm == 1) {
            $picture = $team_member->picture;

            $team_member->picture_id = null;
            $team_member->save();
            Storage::delete("images/" . $picture->path);
            $picture->delete();

            $team_member->delete();
        }

        return redirect('admin/team_member');
    }

    public function deleteImage(Request $request, TeamMember $team_member, Picture $picture)
    {
        if (!empty($confirm = $request->post('confirm')) && $confirm == 1) {
            Storage::delete("images/" . $picture->path);
            $picture->team_members()->detach();
            $picture->delete();
        }

        return redirect('admin/team_member/' . $team_member->id);
    }

    private function saveImages(TeamMember $team_member, $image)
    {
        if (!empty($image)) {
            $name = $image->getClientOriginalName();
            $filename = $image->hashName();
            $image->storeAs('images', $filename);

            $picture = new Picture();
            $picture->name = $name;
            $picture->path = $filename;
            $picture->date = \DateTime::createFromFormat('U', $image->getCTime());
            $picture->save();

            $team_member->picture_id = $picture->id;
            $team_member->save();
        }
    }
}

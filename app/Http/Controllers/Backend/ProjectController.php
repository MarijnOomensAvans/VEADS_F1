<?php

namespace App\Http\Controllers\Backend;

use App\Address;
use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProject;
use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->query('q');

        $projects = Project::leftJoin('addresses', 'projects.address_id', '=', 'addresses.id')
            ->orderBy('projects.name')
            ->select('projects.*');

        if (!empty($q)) {
            $projects = $projects->where('name', 'like', '%' . $q . '%')
                ->orWhere('addresses.country', 'like', '%' . $q . '%')
                ->orWhere('addresses.city', 'like', '%' . $q . '%')
                ->orWhere('addresses.street', 'like', '%' . $q . '%');
        }

        $projects = $projects->paginate(15);

        if ($request->query('json')) {
            return response()->json(compact('projects', 'q'));
        }

        return view('projects/index', compact('projects', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreProject  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProject $request)
    {
        $validated = $request->validated();

        $address = new Address($validated);
        $address->save();

        $project = new Project($validated);
        $project->address_id = $address->id;
        $project->save();

        return redirect('admin/projects/' . $project->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Project $project)
    {
        if ($request->query('json')) {
            return response()->json(compact('project'));
        }

        return view('projects/show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects/edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreProject  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProject $request, Project $project)
    {
        $validated = $request->validated();

        $address = $project->address;
        $address->fill($validated);
        $address->save();

        $project->fill($validated);
        $project->save();

        return redirect('admin/projects/' . $project->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        return view('projects/destroy', compact('project'));
    }

    public function delete(Request $request, Project $project) {
        if (!empty($confirm = $request->post('confirm')) && $confirm == 1) {
            Event::where('project_id', $project->id)->update(['project_id' => null]);
            $project->volunteers()->sync([]);
            $project->delete();
            $project->address()->delete();
        }

        return redirect('admin/projects');
    }
}

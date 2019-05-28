<?php

namespace App\Http\Controllers\Backend;

use App\Address;
use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProject;
use App\Picture;
use App\Project;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

        return view('back.projects.index', compact('projects', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.projects.create');
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

        if (!isset($validated['description'])) {
            $validated['description'] = '';
        }

        $project = new Project($validated);

        if (isset($validated['street']) && !empty($validated['street'])) {
            $address = new Address($validated);
            $address->save();
            $project->address_id = $address->id;
        }

        $project->save();

        if(isset($validated['tags'])) {

            // get the input from form
            $tags = $validated['tags'];

            // split by comma
            $tagsArrayString = explode(', ', $tags);

            // remove all tags from event
            $project->tags()->detach();

            // loop trough all tags from form input
            foreach ($tagsArrayString as $tag) {    // ! ['bader', 'marijn', 'test']

                // find the tag
                $existingTag = Tag::where('name', '=', $tag)->first();  // ! ['marijn']

                // check if tag exits
                if (empty($existingTag)) {

                    // maak een nieuw tags
                    $project->tags()->create(['name' => $tag]);
                } else {
                    // attach bestaande tags
                    $project->tags()->attach($existingTag->id);
                }

            }
        }

        if ($request->hasFile('image')) {
            $this->saveImages($project, $request->file('image'));
        }

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

        return view('back.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('back.projects.edit', compact('project'));
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

        if (!isset($validated['description']) || empty($validated['description'])) {
            $validated['description'] = '';
        }

        if (isset($validated['street']) && !empty($validated['street'])) {
            if (empty($project->address)) {
                $address = $project->address;
            } else {
                $address = new Address();
            }

            $address->fill($validated);
            $address->save();

            $project->address_id = $address->id;
        } else if (!empty($project->address)) {
            $address = $project->address;
            $project->address_id = null;
            $project->save();
            $address->delete();
        }

        $project->fill($validated);
        $project->save();

        if(isset($validated['tags'])) {

            // get the input from form
            $tags = $validated['tags'];

            // split by comma
            $tagsArrayString = explode(', ', $tags);

            // remove all tags from event
            $project->tags()->detach();

            // loop trough all tags from form input
            foreach ($tagsArrayString as $tag) {    // ! ['bader', 'marijn', 'test']

                // find the tag
                $existingTag = Tag::where('name', '=', $tag)->first();  // ! ['marijn']

                // check if tag exits
                if (empty($existingTag)) {

                    // maak een nieuw tags
                    $project->tags()->create(['name' => $tag]);
                } else {
                    // attach bestaande tags
                    $project->tags()->attach($existingTag->id);
                }

            }
        }

        if ($request->hasFile('image')) {
            $this->saveImages($project, $request->file('image'));
        }

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
        return view('back.projects.destroy', compact('project'));
    }

    public function delete(Request $request, Project $project) {
        if (!empty($confirm = $request->post('confirm')) && $confirm == 1) {
            $pictures = $project->pictures;

            $project->pictures()->detach();

            foreach($pictures as $picture) {
                Storage::delete("images/" . $picture->path);
                $picture->delete();
            }

            Event::where('project_id', $project->id)->update(['project_id' => null]);
            $project->volunteers()->sync([]);
            $project->delete();
            $project->address()->delete();
        }

        return redirect('admin/projects');
    }

    public function destroyImage(Project $project, Picture $picture) {
        return view('back.projects.image', compact('project', 'picture'));
    }

    public function deleteImage(Request $request, Project $project, Picture $picture) {
        if (!empty($confirm = $request->post('confirm')) && $confirm == 1) {
            $picture->projects()->detach();
            $picture->delete();
        }

        return redirect('admin/projects/' . $project->id);
    }

    private function saveImages(Project $project, $images) {
        foreach($images as $image) {
            $name = $image->getClientOriginalName();
            $filename = $image->hashName();
            $image->storeAs('images', $filename);

            if (strlen($name) > 50) {
                $name = substr($name, -50);
            }

            $picture = new Picture();
            $picture->name = $name;
            $picture->path = $filename;
            $picture->date = \DateTime::createFromFormat('U', $image->getCTime());
            $picture->save();

            $project->pictures()->attach($picture->id);
        }
    }
}

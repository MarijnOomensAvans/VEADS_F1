<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;

class ProjectController extends Controller
{
    public function frontIndex(){
        $projects = Project::paginate(9);
        return view('front.projects', ['projects' => $projects]);
    }

    public function frontShow(Request $request, $id){
        return view('front.project', ['project' => Project::find($id)]);
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\TeamMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;

class ContactController extends Controller
{
    public function index(){
        $team = TeamMember::get();
        return view('front/contact', compact('team'));
    }

    public function store(Request $request) {
        // TODO: Save contact form
    }
}
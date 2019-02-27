<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;

class HomeController extends Controller
{
    public function index(){
        $events = Event::all();
        return view('front/home', ['events' => $events]);
    }
}

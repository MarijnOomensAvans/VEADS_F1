<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;

class HomeController extends Controller
{
    public function index(){
        $events = Event::whereNotNull('featured_position')->orderBy('featured_position', 'asc')->limit(3)->get();
        return view('front/home', compact('events'));
    }
}

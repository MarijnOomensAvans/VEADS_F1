<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use App\Partner;

class HomeController extends Controller
{
    public function index(){

        $events = Event::whereNotNull('featured_position')->where('published', true)->orderBy('featured_position', 'asc')->limit(3)->get();
        $partners = Partner::get();
        return view('front/home', compact('events','partners'));
    }
}

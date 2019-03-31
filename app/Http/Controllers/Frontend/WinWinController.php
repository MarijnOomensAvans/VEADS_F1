<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use Illuminate\Support\Facades\Auth;

class WinWinController extends Controller
{
    public function index() {
        return view('front/winwin');
    }

    public function enrollVolunteer() {
        $events = Event::get();
        return view('front.win-win.enrollVolunteer', ['events' => $events ]);
    }

}
<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;

class WinWinController extends Controller
{
    public function index(){
        return view('front/winwin');
    }
}
<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct() {
    	$this->middleware("auth");
    }

    public function index() {
    	return view('back.admin.index');
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\GoogleService;

class AdminController extends Controller
{
    public function __construct() {
    	$this->middleware("auth");
    }

    public function index(GoogleService $googleService) {
        $analyticsData = $googleService->getAnalyticsReport();
    	return view('back.admin.index', ['analyticsData' => $analyticsData]);
    }
    
}

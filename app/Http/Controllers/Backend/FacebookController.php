<?php

namespace App\Http\Controllers\Backend;

use App\Services\FacebookService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FacebookController extends Controller
{
    public function index(FacebookService $facebookService) {
        $fb = $facebookService->getFacebookClient();

        $urlHelper = $fb->getRedirectLoginHelper();
        $permissions = ['manage_pages'];
        $fbLoginUrl = $urlHelper->getLoginUrl(config('app.url') . '/fb/callback', $permissions);

        return view('back.facebook.index', ['fb_login_url' => $fbLoginUrl]);
    }
}

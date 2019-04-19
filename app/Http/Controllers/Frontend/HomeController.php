<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use App\Partner;
use App\FacebookPage;
use App\InstagramPage;

class HomeController extends Controller
{
    public function index(){

        $socialPosts = collect();

        $facebookPages = FacebookPage::get();
        $instagramPages = InstagramPage::get();

        $socialPages = collect()->merge($facebookPages)->merge($instagramPages)->sortBy('created_at');

        foreach ($socialPages as $page) {
            foreach($page->lastPosts(2) as $post){
                $socialPosts->push($post);
            }
        }

        $events = Event::whereNotNull('featured_position')->where('published', true)->orderBy('featured_position', 'asc')->limit(3)->get();
        $partners = Partner::get();
        return view('front/home', compact('events','partners', 'socialPosts'));
    }
}

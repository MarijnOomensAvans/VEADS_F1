<?php

namespace App\Http\Controllers\Frontend;

use App\Donation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use App\Partner;
use App\FacebookPage;
use App\InstagramPage;
use Illuminate\Support\Facades\DB;

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
        $partners = Partner::whereNotNull('featured_position')->orderBy('featured_position', 'asc')->limit(3)->get();
        $allpartners = Partner::get();

        $components = array_map(function($item){return $item->component;}, DB::select('SELECT component FROM homepage_order ORDER BY `order` ASC'));
        $donated = ceil(Donation::whereNotNull('payment_id')->whereNull('refunded_at')->whereNotNull('paid_at')->sum('amount'));
        $backers = Donation::whereNotNull('payment_id')->whereNull('refunded_at')->whereNotNull('paid_at')->count();

        return view('front/home', compact('events','partners', 'allpartners', 'socialPosts', 'components', 'donated', 'backers'));
    }
}

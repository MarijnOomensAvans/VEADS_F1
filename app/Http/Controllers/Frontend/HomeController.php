<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use App\Partner;

class HomeController extends Controller
{
    public function index(){

        // Facebook
        $fb = new \Facebook\Facebook([
            'app_id' => '385136325656677',
            'app_secret' => '7191f32e96884b95e12d4f657419263c',
            'default_graph_version' => 'v2.10',
        ]);

        try {
            $response = $fb->get('/socialreturnworks/posts', 'EAAFeR4nhgGUBAKM4F0NcnfELFG7cIpJpKlHeYhWxxfQZBHpZCKbAwC5yNp02Fe5MSVQAhqAsewmLwXOMmnr230Ns73FCIhlbSOwE5kZCer0qzdEZAZAOxZBwp1oPpB8mBSFXWylL27oNKad0U51IXq77yvao7xzSou0aDduRZBDDIv8BfScuQLwyfZBfZA4g9OkZARVOb49JxmRgZDZD');
        } catch(\Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(\Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        return $response->getDecodedBody();

        $events = Event::whereNotNull('featured_position')->where('published', true)->orderBy('featured_position', 'asc')->limit(3)->get();
        $partners = Partner::get();
        return view('front/home', compact('events','partners'));
    }
}

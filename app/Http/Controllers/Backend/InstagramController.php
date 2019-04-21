<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\InstagramPage;
use Carbon\Carbon;

class InstagramController extends Controller
{
    public function index(){
        
        $instagram_client_id = config('instagram.client_id');
        $redirect_url = config('app.url') . '/admin/instagram/callback';
        $instagram_auth_url = "https://api.instagram.com/oauth/authorize/?client_id=$instagram_client_id&redirect_uri=$redirect_url&response_type=code";
        $instagram_pages = InstagramPage::all();
        return view('back.instagram.index', ['instagram_auth_url' => $instagram_auth_url, 'instagram_pages' => $instagram_pages]);
    }

    public function callback(Request $request){

        $post = [
            'client_id' => config('instagram.client_id'),
            'client_secret' => config('instagram.client_secret'),
            'grant_type' => 'authorization_code',
            'redirect_uri' => config('app.url') . '/admin/instagram/callback',
            'code' => $request->input('code')
        ];

        $ch = curl_init('https://api.instagram.com/oauth/access_token');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        // execute!
        $response = curl_exec($ch);

        // close the connection, release resources used
        curl_close($ch);

        // get user with token
        $access_token = json_decode($response)->access_token;
        $username = json_decode($response)->user->username;

        $instagram_page = InstagramPage::find($username);

        if (empty($instagram_page)) {
            $instagram_page = new InstagramPage();
        }

        $instagram_page->fill([
            'name' => $username,
            'access_token' => $access_token,
            'last_refresh' => Carbon::now()
        ]);
        
        $instagram_page->save();

        return redirect(action('Backend\InstagramController@index'));
    }

    public function update(){
        Artisan::call('facebook:update');
        return redirect(action('Backend\FacebookController@index'));
    }
}

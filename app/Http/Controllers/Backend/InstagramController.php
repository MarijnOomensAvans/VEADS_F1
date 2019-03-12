<?php

namespace App\Http\Controllers\Backend;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class InstagramController extends Controller
{
    public function askAuthorization() {
        $instagram_user = getInstagramUser();
        $media = getInstagramMedia(4);

        return view('instagram.ask', ['instagram_user' => $instagram_user, 'media' => $media]);
    }

    public function callback(Request $request) {
        if(!$request->has('code') && !$request->has('error')) {
            return abort(400, 'Instagram authorization code is missing');
        }

        if ($request->has('error')) {
            session()->flash('instagram_error', $request->get('error_description'));

            return redirect(route('admin/instagram'));
        }

        $code = $request->get('code');

        $client = new Client();

        try {
            $response = $client->request('POST', 'https://api.instagram.com/oauth/access_token', [
                'form_params' => [
                    'client_id' => config('instagram.client_id'),
                    'client_secret' => config('instagram.client_secret'),
                    'grant_type' => 'authorization_code',
                    'redirect_uri' => config('instagram.redirect_uri'),
                    'code' => $code
                ]
            ]);
        } catch (GuzzleException $e) {
            session()->flash('instagram_error', $e->getMessage());

            return redirect(route('admin/instagram'));
        }

        $body = (string) $response->getBody();
        $body = json_decode($body);

        if (empty($body)) {
            session()->flash('instagram_error', 'We hebben geen access token terug gekregen van Instragram. Probeer het later nog een keer.');

            return redirect(route('admin/instagram'));
        }

        Storage::put('instagram_access_token.txt', $body->access_token);

        return redirect(route('admin/instagram'));
    }
}

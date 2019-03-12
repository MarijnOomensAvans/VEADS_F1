<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;

function getInstagramAccessToken() {
    return Cache::get('instagram_access_token', function() {
        if (!Storage::exists('instagram_access_token.txt')) {
            return null;
        }

        $content = Storage::get('instagram_access_token.txt');

        Cache::put('instagram_access_token', $content, now()->addDay());

        return $content;
    });
}

function getInstagramUser() {
    return json_decode(Cache::get('instagram_user', function() {
        $client = new Client();

        $token = getInstagramAccessToken();

        if (empty($token)) {
            return null;
        }

        $response = $client->request('GET', 'https://api.instagram.com/v1/users/self/?access_token=' . $token);

        $body = (string) $response->getBody();
        $body = json_decode($body);

        Cache::put('instagram_user', json_encode($body->data), now()->addHours(2));

        return json_encode($body->data);
    }));
}

function getInstagramMedia(int $amount = 5) {
    return json_decode(Cache::get('instagram_media_' . $amount, function() use ($amount) {
        $client = new Client();

        $token = getInstagramAccessToken();

        if (empty($token)) {
            return null;
        }

        $response = $client->request('GET', 'https://api.instagram.com/v1/users/self/media/recent/?access_token=' . $token . '&count=' . $amount);

        $body = (string) $response->getBody();
        $body = json_decode($body);

        Cache::put('instagram_media_' . $amount, json_encode($body->data), now()->addHours(2));

        return json_encode($body->data);
    }));
}

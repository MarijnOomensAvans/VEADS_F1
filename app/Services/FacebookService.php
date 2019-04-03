<?php
namespace App\Services;

use Facebook\Facebook;

class FacebookService {
    public function getFacebookClient() {
        return new Facebook([
            'app_id' => config('facebook.app_id'),
            'app_secret' => config('facebook.app_secret'),
            'persistent_data_handler' => new FbPersistentDataHelper()
        ]);
    }
}

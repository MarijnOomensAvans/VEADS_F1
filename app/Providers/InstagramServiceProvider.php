<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class InstagramServiceProvider extends ServiceProvider {
    public function register() {
        require_once app_path('Helpers/InstagramHelper.php');
    }
}

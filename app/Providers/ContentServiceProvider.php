<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ContentServiceProvider extends ServiceProvider {
    public function register() {
        require_once app_path('Helpers/ContentHelper.php');
    }
}

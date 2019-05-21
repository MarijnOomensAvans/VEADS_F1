<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Storage;

class RedirectToInstallation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Storage::has('installed')) {
            return redirect('/wizard');
        }

        return $next($request);
    }
}

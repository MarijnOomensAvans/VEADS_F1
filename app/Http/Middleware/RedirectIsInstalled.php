<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Storage;

class RedirectIsInstalled
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
        if (Storage::has('installed')) {
            return abort(404);
        }

        return $next($request);
    }
}

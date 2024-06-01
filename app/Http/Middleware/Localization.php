<?php

namespace App\Http\Middleware;
use Closure;

class Localization
{

    public function handle($request, Closure $next)
    {
        if (auth('admin')->check() && $request->segment(1) == 'admin') {
            app()->setLocale('ar');
        } else {
            $locale = session()->get('language', config('app.locale'));
            app()->setLocale($locale);
        }

        return $next($request);
    }

}

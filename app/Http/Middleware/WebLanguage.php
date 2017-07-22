<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class WebLanguage
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
        // Source: https://mydnic.be/post/how-to-build-an-efficient-and-seo-friendly-multilingual-architecture-for-your-laravel-application
        // Check if the first segment matches a language code
        if (!array_key_exists($request->segment(1), config('languages'))) {

            // Store segments in array
            $segments = $request->segments();

            // Detect user's language
            $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
            if(!array_key_exists($lang, config('languages'))) {
                $lang = config('app.fallback_locale');
            }

            // Set the language code as the first segment
            $segments = array_prepend($segments, $lang);

            // Redirect to the correct url
            return redirect()->to(implode('/', $segments));
        }
        
        app()->setLocale($request->segment(1));

        return $next($request);
    }
}

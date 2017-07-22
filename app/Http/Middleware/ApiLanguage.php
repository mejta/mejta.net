<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Application;

class ApiLanguage
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
        // read the language from the request header
        $lang = $request->header('Content-Language');

        // if the header is missed
        if(!$lang){
            // take the default local language
            $lang = config('app.fallback_locale');
        }

        // check the languages defined is supported
        if (!array_key_exists($lang, config('languages'))) {
            // respond with error
            return abort(403, 'Language not supported.');
        }

        // set the local language
        app()->setLocale($lang);

        // get the response after the request is done
        $response = $next($request);

        // set Content Languages header in the response
        $response->headers->set('Content-Language', $lang);

        // return the response
        return $response;
    }
}

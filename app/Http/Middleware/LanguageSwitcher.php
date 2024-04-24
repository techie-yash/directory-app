<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App;
use Config;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LanguageSwitcher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    
        {
            if (!Session::has('locale')) {
                Session::put('locale', Config::get('app.locale'));
            }
    
            App::setLocale(Session::get('locale'));
    
            return $next($request);
        }    
}

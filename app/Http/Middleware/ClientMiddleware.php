<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        dd("test");
        if (Auth::guard('client')->check()&&Auth::guard('client')->user()->status == 'inactive'){
            Auth::guard('client')->logout();
            return redirect()->route('clientLogin')->with('error','your account inactive');
        }
        return $next($request);
        // if(Auth::guard('client')->user()){
        //     return $next($request);
        // }

        // return redierct()->route('clientLogin')->withErrors(['email'=>'invalid']);
    }
}

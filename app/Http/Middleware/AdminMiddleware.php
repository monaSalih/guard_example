<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check if the user has admin role (1 for admin)
            if (Auth::user()->role_as == "1") {
                return $next($request);  // Allow the request to proceed
            } else {
                // If user is not an admin, redirect to login with a message
                return redirect('/login')->with('message', 'You are not an admin');
            }
        } else {
            // If the user is not logged in, redirect to login page
            return redirect('/login')->with('message', 'You need to log in first');
        }
    }
}

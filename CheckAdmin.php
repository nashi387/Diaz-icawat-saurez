<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user has admin role in session
        if (session('role') === 'admin') {
            return $next($request);
        }
        
        // Redirect regular users with access denied message
        return redirect('/register')->with('error', 'Access Denied: Admin privileges required.');
    }
}
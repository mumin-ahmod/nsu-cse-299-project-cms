<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            $user = auth()->user();
            $isAdmin = $user->roles->contains('role', 'admin');
            
            if ($isAdmin) {
                // User is an admin, allow access to the route
                return $next($request);
            }
        }

        // User is not an admin, redirect or deny access
        return redirect('/user-dashboard');
    }
}

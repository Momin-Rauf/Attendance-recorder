<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Check if the user is authenticated
        if ($request->user()) {
            // Check if the user's role matches the expected role
            if ($request->user()->role !== $role) {
                // Redirect the user to the welcome page or another appropriate route
                return redirect('welcome');
            }
        } else {
            // Redirect the user to the welcome page or another appropriate route
            return redirect('welcome');
        }

        return $next($request);
    }
}

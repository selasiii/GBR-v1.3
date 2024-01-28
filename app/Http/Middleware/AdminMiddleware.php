<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and has the admin role
        if ($request->user() && $request->user()->role_id == 3) {
            return $next($request);
        }

        // If the user doesn't have the required role, you can redirect them or perform any other action.
        abort(403, 'Unauthorized action.');
    }
}

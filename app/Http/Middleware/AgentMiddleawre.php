<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AgentMiddleawre
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role_id === 2) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');

        // Alternatively, you can redirect to a specific route or perform other actions.
        // return redirect()->route('unauthorized');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if (in_array(auth()->user()->role, ['admin', 'superadmin', 'moderator', 'teacher'])) {
                return $next($request);
            }
        }
        return abort(404);
    }
}

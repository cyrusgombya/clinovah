<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfClinicUnauthenticated
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('clinic')->check()) {
            // If you're using a different prefix (e.g. /clinics/login), change this route.
            return redirect()->route('clinic.login');
        }

        return $next($request);
    }
}
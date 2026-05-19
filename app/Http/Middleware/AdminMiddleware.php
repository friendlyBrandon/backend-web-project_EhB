<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // User must be logged in
        if (!Auth::check()) {
            return redirect('/login');
        }

        // User must be admin
        if (Auth::user()->is_admin != 1) {
            abort(403, 'Access denied.');
        }

        return $next($request);
    }
}
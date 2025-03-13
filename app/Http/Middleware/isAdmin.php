<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('')->with('error', 'Access denied. You do need to be logged in ---- not have permission to access this page.');
        }

        if (Auth::user()->role !== 'admin') {
            return redirect('admin.dashboard.show')->with('error', 'Access denied. You do not have permission to access this page.');
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $userRole = Auth::user()->role;
        if ($userRole !== $role) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Unauthorized
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
<<<<<<< HEAD
        if (!Auth::check()) {
=======
        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }elseif (Auth::check() && Auth::user()->role === 'user') {
            return redirect()->route('user.dashboard');
        }
>>>>>>> origin/main
        return $next($request);
        }
        if (Auth::user()->role === $role) {
            return redirect()->route($role.'.dashboard');
        }
    }
}

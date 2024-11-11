<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class user
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
<<<<<<< HEAD
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
=======
        if (!Auth::check() && !Auth::user()->role === 'user') {
            return redirect()->route('user.login')->withErrors(['login_eror' => 'Silahkan login untuk melanjutkan']);
>>>>>>> origin/main
        }
        return redirect()->route($role . '.login')->withErrors(['login_error' => 'Silakan login untuk melanjutkan']);
    }
}
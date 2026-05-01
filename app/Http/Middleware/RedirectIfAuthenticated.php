<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
{
    $guards = empty($guards) ? [null] : $guards;

    foreach ($guards as $guard) {
        if (Auth::guard($guard)->check()) {
            $user = Auth::user();
            
            // Jika Admin dkk, lempar ke Backend
            if (in_array($user->role, ['0', '1', '2', '3'])) {
                return redirect()->intended(route('v1.backend.beranda.index'));
            }
            
            // Jika Customer, lempar ke Frontend Beranda
            // PASTIKAN route ini tidak membuang user kembali ke login
            return redirect()->intended(route('v1.frontend.beranda.index'));
        }
    }

    return $next($request);
}
}

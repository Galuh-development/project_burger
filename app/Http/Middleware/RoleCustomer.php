<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek: Apakah user sudah login? Dan apakah role-nya adalah 4 (Customer)?
    if (auth()->check() && auth()->user()->role == '4') {
        return $next($request);
    }

    // Jika bukan customer (misal Admin nyoba masuk), lempar ke beranda dengan pesan error
    return redirect('/')->with('error', 'Hanya pelanggan yang dapat mengakses halaman ini.');
    }
}

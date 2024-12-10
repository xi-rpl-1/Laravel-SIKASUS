<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */


    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Cek apakah user sudah login
        if (!session('role')) {
            return redirect()->route('login.types')
                ->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Cek apakah role user sesuai dengan role yang diizinkan
        if (!in_array(session('role'), $roles)) {
            return redirect()->route('login.types')
                ->with('error', 'Anda tidak memiliki akses.');
        }

        return $next($request);
    }

}

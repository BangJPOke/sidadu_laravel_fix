<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CekRole
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Periksa apakah pengguna sudah login
        if (!session()->has('user_id')) {
            return redirect('/login');
        }

        // Periksa apakah role pengguna sesuai
        if (session('role') !== $role) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}
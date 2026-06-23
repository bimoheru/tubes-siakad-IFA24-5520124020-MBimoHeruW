<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsDosen
{
    /**
     * Handle an incoming request.
     * Only allows users with role 'dosen' to pass through.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check() || auth()->user()->role !== 'dosen') {
            abort(403, 'Akses ditolak. Halaman ini hanya untuk Dosen.');
        }

        return $next($request);
    }
}

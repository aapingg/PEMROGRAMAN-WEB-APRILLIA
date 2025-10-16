<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; // <- ini jangan di-comment

class RoleCheck
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // cek apakah user login
        if (!Auth::check()) {
            return redirect()->route('login')->with('status', 'Silakan login dulu.');
        }

        // cek apakah role user termasuk di $roles
        if (!in_array(Auth::user()->role, $roles)) {
            // user tidak punya akses
            Auth::logout();
            return redirect()->route('login')->with('status', 'You are not authorized to access this page.');
        }

        // lanjut ke request berikutnya
        return $next($request);
    }
}

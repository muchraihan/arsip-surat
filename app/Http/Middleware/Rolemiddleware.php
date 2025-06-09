<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Rolemiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): mixed
    {
        if (!Auth::check()){
            return redirect('/login');
        }
        if (Auth::user()->role !== $role){
            abort(403, 'Anda Tidak Memiliki Akses');
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $segment = $request->segment(1);
        if (\Session::get('login') && $segment == 'admin' && \Session::get('group') != 1) {
            return redirect()->back()->withErrors(['error' => 'User tidak diizinkan!']);
        }

        return $next($request);
    }
}

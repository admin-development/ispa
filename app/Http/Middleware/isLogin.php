<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $segment = $request->segments();
        if (\Session::get('login') && in_array('login', $segment)) {
            $goTo = 'app';
            if (\Session::get('group') == 1) {
                $goTo = 'dashboard';
            }
            return redirect()->to(route($goTo));
        }
        else if (!\Session::get('login')) {
            if (!in_array('login', $segment) && !in_array('beranda', $segment) && count($segment) != 0) {
                return redirect()->to(route('login'))->withErrors('error', 'Silakan login terlebih dahulu');
            }
        }

        return $next($request);
    }
}

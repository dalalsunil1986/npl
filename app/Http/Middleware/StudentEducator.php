<?php

namespace App\Http\Middleware;

use Closure;

class StudentEducator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && session()->has('userType') ? ( session()->get('userType') == 'Student' || session()->get('userType') == 'Educator' ) : false) {
            return $next($request);
        } elseif(auth()->check()) {
            return redirect()->to('/home');
        }
        return redirect()->to('/auth/login');
    }
}

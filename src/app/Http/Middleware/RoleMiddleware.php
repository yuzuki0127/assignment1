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
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->role == 'admin') {
            return $next($request);
        }

        // if (auth()->check() && auth()->user()->role == 'admin') {
        //     return redirect()->route('quiz.admin');
        // }
        
        // dd(auth());
        return redirect()->route('dashboard');
        // return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CoachMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour accéder à cette page.');
        }

        if (!in_array($request->user()->role_id, [3, 4])) { // Coach ou Admin
            return redirect()->route('home')->with('error', 'Accès refusé. Seuls les coachs et administrateurs peuvent accéder à cette page.');
        }

        return $next($request);
    }
}

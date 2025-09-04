<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
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

        if (!in_array($request->user()->role_id, [2, 3, 4])) { // User, Coach ou Admin
            return redirect()->route('home')->with('error', 'Accès refusé. Vous devez être un utilisateur enregistré pour accéder à cette page.');
        }

        return $next($request);
    }
}

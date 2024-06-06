<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MedsisterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user()->role->title === 'doctor' && auth()->user()->doctor->competence->title === 'Медицинский персонал')
            return $next($request);

        return redirect()->route('client.index');
    }
}

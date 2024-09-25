<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ValidEmailMiddleware
{
    /**
     * Handle an incoming request
     * @param  Request                   $request
     * @param  Closure                   $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next): Response|RedirectResponse
    {
        if (Auth::check() && $request->user()->hasVerifiedEmail()) {
            return $next($request);
        }
        return redirect('/')->withErrors(['error' => 'Email is not verified.']);
    }
}

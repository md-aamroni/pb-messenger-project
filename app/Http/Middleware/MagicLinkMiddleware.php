<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Utilities\PasswordLessLogin;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MagicLinkMiddleware
{
    /**
     * Handle an incoming request
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response|RedirectResponse
    {
        if (Auth::check()) {
            return $next($request);
        }

        $validator = PasswordLessLogin::validate(request: $request);
        if (isset($validator->error, $validator->token) && $validator->error === false) {
            $instance = User::query()->findOrFail(id: $validator->token);
            if (isset($instance) && $instance instanceof User) {
                Auth::login($instance);
                $request->session()->regenerate();
                return redirect()->intended(route('home', absolute: false));
            }
        }

        return $next($request);
    }
}

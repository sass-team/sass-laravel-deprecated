<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;

/**
 * Class Authenticate.
 *
 * @codeCoverageIgnore
 */
class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  Request          $request
     * @param  \Closure         $next
     * @param Guard|null|string $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next, Guard $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware\Api\V1;

use App\Http\Responders\Api\ApiResponder;
use Closure;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class Authenticate
{
    use ApiResponder;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($token = JWTAuth::getToken()) {
            return $this->respondTokenMissing();
        }

        $token->authenticate($token);

        if ($token instanceof TokenExpiredException) {
            $this->respondTokenExpired();
        }

        if ($token instanceof TokenInvalidException) {
            $this->respondTokenInvalid();
        }

        return $next($request);
    }
}

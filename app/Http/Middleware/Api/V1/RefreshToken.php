<?php

namespace App\Http\Middleware\Api\V1;

use App\Http\Responders\Api\ApiResponder;
use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Facades\JWTAuth;

class RefreshToken
{
    use ApiResponder;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $newToken = JWTAuth::parseToken()->refresh();

        if ($newToken instanceof TokenExpiredException) {
            $this->respondTokenExpired();
        }

        if ($newToken instanceof JWTException) {
            $this->respondTokenInvalid();
        }

        $response->headers->set('Authorization', 'Bearer '.$newToken);

        return $response;
    }
}

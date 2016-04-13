<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Api\V1\LoginRequest;
use App\Http\Requests\Request;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * Class AuthController.
 */
class AuthController extends ApiController
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * @param LoginRequest $loginRequest
     * @return \Illuminate\Http\Response|mixed
     */
    public function postLogin(LoginRequest $loginRequest)
    {
        if ($lockedOut = $this->hasTooManyLoginAttempts($loginRequest)) {
            return $this->respondApiLimitExceeded();
        }

        $credentials = $this->getCredentials($loginRequest);

        if (Auth::guard($this->getGuard())->attempt($credentials)) {
            return $this->handleUserWasAuthenticated($loginRequest, true);
        }

        if (! $lockedOut) {
            $this->incrementLoginAttempts($loginRequest);
        }

        return $this->respondUnprocessableEntity('Invalid credentials.');
    }

    /**
     * @param Request $loginRequest
     * @param User    $user
     * @return mixed
     */
    protected function authenticated(Request $loginRequest, User $user)
    {
        $token = JWTAuth::fromUser($user);

        return $this->respondWithSuccess(['token' => $token]);
    }

}

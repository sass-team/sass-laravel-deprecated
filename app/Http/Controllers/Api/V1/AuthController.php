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
     * @api {post} /api/v1/login Login
     * @apiPermission none
     * @apiVersion 1.0.0
     * @apiName AuthLogin
     * @apiGroup Auth
     * @apiParam {String} email The email of the user.
     * @apiParam {String} password The password of the user.
     * @apiDescription Retrieve a login token.
     * @apiExample {curl} Example usage:
     *      curl --data "email=email@email.com&password=some-password" "http://sass-stage.herokuapp.com//api/v1/login"
     *
     * @apiSuccess {token} token The token to be used on each subsequent request headers'. e.g. Bearer the-tken
     * @apiSuccess {status_code} status_code The http status code representing successful request.
     * @apiSuccessExample {json} Success-Response:
     *      HTTP/1.1 200 OK
     *      {
     *          'status_code' => 200,
     *          'data'        => [
     *              'token' => 'some-token',
     *          ],
     *      }
     *
     * @apiError status_code HTTP Error Status Codes.
     * <a href='https://tools.ietf.org/html/rfc4918#section-11.2'>422 Unprocessable Entity</a>
     * @apiErrorExample Error-Response:
     *     HTTP/1.1 422 Unprocessable Entity
     *     {
     *          "error": {
     *              "message": "Invalid credentials.",
     *              "status_code": 422
     *          }
     *     }
     */
    
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

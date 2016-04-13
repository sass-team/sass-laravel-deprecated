<?php

namespace App\Http\Requests\Api\V1;

use App\Http\Requests\Request;
use App\Http\Responders\Api\ApiResponder;

class LoginRequest extends Request
{
    use ApiResponder;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'    => 'required|email',
            'password' => 'required',
        ];
    }

    public function response(array $messages)
    {
        $errors = $this->getValidatorInstance()->getMessageBag();

        if ($errors->has('email')) {
            return $this->respondUnprocessableEntity($errors->first('email'));
        }

        if ($errors->has('password')) {
            return $this->respondUnprocessableEntity($errors->first('password'));
        }

        return $this->respondInternalServerError();
    }
}

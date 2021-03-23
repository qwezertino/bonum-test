<?php

namespace App\Http\Requests;

use App\Http\Requests\Api\ApiRequest;

class StoreUserRequest extends ApiRequest
{
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
            'email' => 'email|required|unique:users',
            'fullname' => 'required|string|regex:/^[a-zA-Z\s]+$/u|max:255',
            'password' => 'required|min:4|max:25',
            'birth_date' => 'required|date_format:Y-m-d',
        ];
    }
}

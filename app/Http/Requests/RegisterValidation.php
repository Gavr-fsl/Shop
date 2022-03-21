<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterValidation extends FormRequest
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
            'fullname' => 'required',
            'address' => 'required',
            'email' => 'required',
            'login' => 'required|unique:users',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|same:password',
        ];
    }
}

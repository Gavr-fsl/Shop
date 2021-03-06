<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class EditUserValidation extends FormRequest
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
            'password' => 'nullable|confirmed|min:6',
            'password_confirmation' => 'nullable|same:password',
        ];
    }
}

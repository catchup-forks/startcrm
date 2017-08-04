<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUser extends FormRequest
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
            'username' => ['required', 'unique:users,username', 'regex:/'.\App\User::USERNAME_REGEX.'/'],
            'is_admin' => 'required|boolean',
            'is_expert' => 'required|boolean'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => '* required',
            'unique' => '* already exists',
            'regex' => '* incorrect format (E.g S1234567G), case sensitive',
            'boolean' => '* invalid selection'
        ];
    }

}

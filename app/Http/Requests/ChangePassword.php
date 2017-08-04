<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ChangePassword extends FormRequest
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
            'currpass' => 'required',
            'newpass' => ['required', 'different:currpass','regex:/'.\App\User::PASSWORD_REGEX.'/'],
            'retypepass' => ['required', 'same:newpass']
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
            'regex' => '* must fulfill the requirements stated above',
            'same' => '* must be same as new password',
            'different' => '* must be different from current password'
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            // validate current password
            if (!Hash::check($this->currpass, Auth::user()->password)) {
                $validator->errors()->add('currpass', '* incorrect password');
            }
        });
    }

}

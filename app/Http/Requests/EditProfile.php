<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class EditProfile extends FormRequest
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
            'fullname' => 'required|max:40',
            'dob' => 'required|date|before:'.Carbon::today(),
            'age' => 'required|integer|between:1,99',
            'gender' => 'required|between:1,2',
            'email' => 'required|email',
            'mailaddr' => 'required|max:400',
            'contacthp' => 'required|digits:8',
            'contacthome' => 'digits:8',
            'image' => 'mimes:jpeg,jpg,png|max:5120',
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
            'fullname.max' => '* less than 40 characters',
            'date' => '* invalid date',
            'before' => '* must be earlier than today',
            'age.between' => '* must be between 1 and 99',
            'age.integer' => '* must be integer',
            'email' => '* invalid email',
            'between' => '* invalid selection',
            'digits' => '* :digits digits required',
            'mimes' => '* .png, .jpeg or .jpg only',
            'image.max' => '* size must be smaller than 5MB',
            'mailaddr.max' => '* must be less than :max characters'
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
            // validate image file not corrupted
            if ($this->hasFile('image') && !$this->file('image')->isValid()) {
                $validator->errors()->add('image', '* file was corrupted');
            }

        });
    }

}

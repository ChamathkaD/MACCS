<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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
            'current_password' => ['required'],
            'password' => ['required', 'min:8', 'confirmed'],
            'password_confirmation' => ['required'],
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
            'current_password.required' => 'Please enter your current password.',
            'password.required' => 'Please enter your new password.',
            'password_confirmation.required' => 'Please re-enter your new password.',
            'password.min' => 'Your password must be 8 or more characters in length.',
            'password.confirmed' => 'Your new password and confirmation password do not match. try again!',
        ];
    }
}

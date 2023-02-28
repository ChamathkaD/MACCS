<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveAdminRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
            {
                return [
                    'name' => ['required', 'string', 'max:100'],
                    'email' => ['required', 'string', 'email', 'max:70', 'unique:admins,email'],
                    'type' => ['required']
                ];
                break;
            }
            case 'PUT':
            {
                return [
                    'name' => ['required', 'string', 'max:100'],
                    'email' => [
                        'required',
                        'string',
                        'email',
                        'max:70',
                        Rule::unique('admins', 'email')->ignore($this->route('admin')->id),
                    ],
                    'type' => ['required']
                ];
                break;
            }
            default: break;
        }
    }
}

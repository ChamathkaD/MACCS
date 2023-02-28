<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class SaveMidwifeRequest extends FormRequest
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
                    'first_name' => ['required', 'string', 'max:100'],
                    'last_name' => ['nullable', 'string', 'max:100'],
                    'email' => ['required', 'string', 'email', 'max:70', 'unique:midwives,email'],
                    'phone' => ['nullable', 'string', 'unique:midwives,phone','regex:/^[0-9]{10}/'],
                    'nic' => ['nullable', 'string','regex:/([0-9]{9}[x|X|v|V]|[0-9]{12})/', 'unique:midwives,nic'],
                    'cases' => ['nullable', 'integer'],
                ];
                break;
            }
            case 'PUT':
            {
                return [
                    'first_name' => ['required', 'string', 'max:100'],
                    'last_name' => ['nullable', 'string', 'max:100'],
                    'email' => [
                        'required',
                        'string',
                        'email',
                        'max:70',
                        Rule::unique('midwives', 'email')->ignore($this->route('midwife')->id),
                    ],
                    'phone' => [
                        'nullable',
                        'string',
                        Rule::unique('midwives', 'phone')->ignore($this->route('midwife')->id),
                        'regex:/^[0-9]{10}/'
                    ],
                    'nic' => [
                        'nullable',
                        'string',
                        'regex:/([0-9]{9}[x|X|v|V]|[0-9]{12})/',
                        Rule::unique('midwives', 'nic')->ignore($this->route('midwife')->id),
                    ],
                    'cases' => ['nullable', 'integer'],
                ];
                break;
            }
            default: break;
        }
    }
}

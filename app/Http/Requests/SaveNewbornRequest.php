<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class SaveNewbornRequest extends FormRequest
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
                    'apgar_score' => ['required', 'integer','between:0,10'],
                    'birth_height' => ['required', 'numeric', 'between:0.0,6.0'],
                    'birth_hcm' => ['required', 'numeric', 'between:0.0,50.0'],
                    'skin' => ['required', 'string'],
                    'eyes' => ['required', 'string'],
                    'temperature' => ['required', 'numeric'],
                    'notes' => ['nullable', 'string'],

                ];
                break;
            }
            case 'PUT':
            {
                return [
                    'apgar_score' => ['required', 'integer','between:0,10'],
                    'birth_height' => ['required', 'numeric', 'between:0.0,100.0'],
                    'birth_hcm' => ['required', 'numeric', 'between:0.0,50.0'],
                    'skin' => ['required', 'string'],
                    'eyes' => ['required', 'string'],
                    'temperature' => ['required', 'numeric'],
                    'notes' => ['nullable', 'string'],
                ];
            }
            default: break;
        }
    }
}

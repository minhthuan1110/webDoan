<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'password' => 'required|min:6',
            'new_password' => 'required|min:6',
            're_new_password' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => __('password.required'),
            'password.min' => __('password.min', ['min' => 6]),
            'new_password.required' => __('password.new.required'),
            'new_password.min' => __('password.new.min', ['min' => 6]),
            're_new_password.required' => __('password.renew.required'),
            're_new_password.min' => __('password.renew.min', ['min' => 6]),
        ];
    }
}

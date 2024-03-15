<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'username' => ['required', 'string'],
            'phone' => ['required', 'string', 'unique:users,phone'],
            'email' => ['required', 'string', 'unique:users,email'],
            'password' => ['required', 'string'],
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required|string|email|max:255|exists:users',
            'password' => 'required',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

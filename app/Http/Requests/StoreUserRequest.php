<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'max: 30',
            ],
            'level' => [
                'required',
            ],
            'email' => [
                'required',
                'string',
                'unique:users,email',
            ],
            'password' => [
                'required_with: password_confirmation',
                'same:password_confirmation',
                Password::min(8)->letters()->numbers(),
            ],
        ];
    }

}

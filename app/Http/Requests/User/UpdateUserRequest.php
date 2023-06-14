<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        // get email input from the request
        $user = $this->route('user');

        return [
            'name' => [
                'sometimes',
                'required'
            ],
            'email' => [
                'sometimes',
                'required',
                Rule::unique('users')->ignore($user->email, 'email')
            ],
            'password' => [
                'sometimes',
                'required',
                'confirmed'
            ]
        ];
    }
}

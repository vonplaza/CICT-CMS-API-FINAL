<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->tokenCan('can_create_user');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'unique:users,email'],
            'password' => ['required', 'confirmed'],
            'role' => ['required'],
            'departmentId' => [],
        ];
    }

    public function prepareForValidation()
    {
        // return $this->merge([
        //     'password' => bcrypt($this->password)
        // ]);
    }
}
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'required'],
            'address' => ['sometimes', 'required'],
            'phoneNo' => ['sometimes', 'required'],
            'birthDate' => ['sometimes', 'required'],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'phone_no' => $this->phoneNo,
            'birth_date' => $this->birthDate
        ]);
    }
}

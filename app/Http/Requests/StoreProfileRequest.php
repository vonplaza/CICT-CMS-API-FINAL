<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfileRequest extends FormRequest
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
            'name' => ['required'],
            'address' => ['required'],
            'phoneNo' => ['required'],
            'birthDate' => ['required'],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'phone_no' => $this->phoneNo,
            'birth_date' => $this->birthDate,
            'user_id' => $this->User()->id
        ]);
    }
}

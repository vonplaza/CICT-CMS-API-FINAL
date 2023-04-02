<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateElectiveSubjectRequest extends FormRequest
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
            'track' => 'sometimes|required|string|unique:elective_subjects,track',
            'elective1' => 'sometimes|required|string',
            'elective2' => 'sometimes|required|string',
            'elective3' => 'sometimes|required|string',
            'elective4' => 'sometimes|required|string',
            'elective5' => 'sometimes|required|string',
        ];
    }

    public function prepareForValidation()
    {
        return $this->merge([
            'elective_1' => $this->elective1,
            'elective_2' => $this->elective2,
            'elective_3' => $this->elective3,
            'elective_4' => $this->elective4,
            'elective_5' => $this->elective5,
        ]);
    }
}

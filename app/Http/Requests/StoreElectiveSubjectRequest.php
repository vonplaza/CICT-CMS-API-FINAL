<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreElectiveSubjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return $this->user()->tokenCan('can_create_elective_subject');
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
            'track' => 'required|string|unique:elective_subjects,track',
            'elective1' => 'required|string',
            'elective2' => 'required|string',
            'elective3' => 'required|string',
            'elective4' => 'required|string',
            'elective5' => 'required|string',
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

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubjectRequest extends FormRequest
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
            'description' => 'sometimes|required|string|unique:subjects,description',
            'syllabus' => 'sometimes|required|file|mimes:pdf'
        ];
    }

    public function prepareForValidation()
    {
        if ($this->subjectCode) {
            $this->merge([
                'subject_code' => $this->subjectCode
            ]);
        }
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubjectRequest extends FormRequest
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
            'subjectCode' => ['required', 'unique:subjects,subject_code'],
            'description' => ['required'],
            'departmentId' => ['required'],
            'userId' => ['required']
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'subject_code' => $this->subjectCode,
            'department_id' => $this->departmentId,
            'user_id' => $this->userId
        ]);
    }
}

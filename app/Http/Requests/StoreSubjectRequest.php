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
        // return $this->user()->tokenCan('can_create_subject');
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'subjectCode' => ['required', 'unique:subjects,subject_code'],
            'description' => ['required'],
            'departmentId' => ['required'],
            'syllabus' => 'required|file|mimes:pdf'
        ];

        // if ($this->hasFile('image')) {
        //     $rules['image'] = 'image|mimes:jpeg,png|max:2048';
        // }

        return $rules;
    }

    public function prepareForValidation()
    {
        $this->merge([
            'subject_code' => $this->subjectCode,
            'department_id' => $this->departmentId,
            'user_id' => $this->user()->id,
        ]);
    }
}

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
        ];
    }

    public function prepareForValidation()
    {
        return $this->merge([
            'metadata' => json_encode($this->metadata),
        ]);
    }
}

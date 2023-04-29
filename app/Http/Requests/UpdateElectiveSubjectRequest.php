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
            'metadata' => 'sometimes|required|string',

        ];
    }

    public function prepareForValidation()
    {
        if ($this->track) {
            $this->merge([
                'track' => $this->track,
            ]);
        }
        if ($this->metadata) {
            $this->merge([
                'metadata' => json_encode($this->metadata)
            ]);
        }
    }
}

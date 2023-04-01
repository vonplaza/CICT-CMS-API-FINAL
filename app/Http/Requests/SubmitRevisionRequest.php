<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmitRevisionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->tokenCan('can_submit_revision');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'metadata' => ['required'],
            'curriculumId' => ['required'],
            'version' => ['required'],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'curriculum_id' => $this->curriculumId,
            'user_id' => $this->user()->id,
        ]);
    }
}

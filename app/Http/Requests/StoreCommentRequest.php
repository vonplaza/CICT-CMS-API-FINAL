<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return $this->user()->tokenCan('can_comment');
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
            'userId' => ['required'],
            'curriculumId' => ['sometimes'],
            'curriculumRevisionId' => ['sometimes'],
            'body' => ['required'],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'user_id' => $this->userId,
            'curriculum_id' => $this->curriculumId,
            'curriculum_revision_id' => $this->curriculumRevisionId
        ]);
    }
}

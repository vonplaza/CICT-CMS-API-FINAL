<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCurriculumRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return $this->user()->tokenCan('can_create_curriculum');
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
            'subjects' => 'required',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'metadata' => json_encode($this->subjects),
            'user_id' => $this->User()->id,
            'department_id' => $this->User()->department_id,
            'version' => '1.0'
        ]);
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreElectiveRequest extends FormRequest
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
            'syllabus' =>  'required|file|mimes:pdf',
            'description' => 'required|unique:electives,description',
        ];
    }
    public function prepareForValidation()
    {
        $this->merge([
            'user_id' => $this->user()->id,
            'syllabus_path' => ''
        ]);
    }
}

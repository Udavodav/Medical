<?php

namespace App\Http\Requests\Admin\Specialist;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'isChangeFile' => $this->isChangeFile == 'on' ? true : false,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'birthday' => 'required|date',
            'competence_id' => 'required|exists:competences,id',
            'education' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
            'isChangeFile' => 'boolean',
        ];
    }
}

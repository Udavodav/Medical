<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVisitRequest extends FormRequest
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
            'visit_id' => 'required|integer|exists:visits,id',
            'conclusion' => 'required|string',
            'isChangeFile' => 'boolean',
            'file' => 'nullable|file|mimes:pdf',
        ];
    }
}

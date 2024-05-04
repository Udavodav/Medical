<?php

namespace App\Http\Requests\Admin\Specialist;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|string',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClubFormRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'max:255',
                request()->isMethod('PUT') ? 'unique:clubs,name,' . $this->route('club') : 'unique:clubs,name',
            ],
            'logo' => 'nullable|image|max:5000',
            'phone' => [
                'nullable',
                'string',
                'max:20',
                request()->isMethod('PUT')
                    ? 'unique:clubs,phone,' . $this->route('club')
                    : 'unique:clubs,phone',
            ],
            'email' => ['nullable', 'email', request()->isMethod('PUT')
                ? 'unique:clubs,email,' . $this->route('club')
                : 'unique:clubs,email'],
            'yob' => 'nullable|numeric|digits:4',
            'address' => 'nullable|string',
            'description' => 'nullable|string',
        ];
    }
}

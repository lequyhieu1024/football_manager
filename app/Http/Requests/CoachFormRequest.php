<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoachFormRequest extends FormRequest
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
                'max:255'
            ],
            'avatar' => 'nullable|image|max:5000|max:255',
            'phone' => [
                'nullable',
                'string',
                'max:20',
                request()->isMethod('PUT')
                    ? 'unique:coaches,phone,' . $this->route('coach')
                    : 'unique:coaches,phone',
            ],
            'email' => ['nullable', 'email', request()->isMethod('PUT')
                ? 'unique:coaches,email,' . $this->route('coach')
                : 'unique:coaches,email'],
            'gender' => 'required|boolean',
            'yob' => 'nullable|numeric|digits:4',
            'address' => 'nullable|string',
            'description' => 'nullable|string',
        ];
    }
}

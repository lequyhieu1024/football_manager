<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatchFormRequest extends FormRequest
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
            'match_type' => 'required|integer|in:7,9,11',
            'at_day' => 'required|date',
            'at_time' => 'required',
            'match_duration' => 'required|integer|min:1|max:3000',
            'club1_id' => 'required|integer|exists:clubs,id',
            'club2_id' => 'required|integer|exists:clubs,id',
            'yard_id' => 'required|integer|exists:yards,id',
        ];
    }
}

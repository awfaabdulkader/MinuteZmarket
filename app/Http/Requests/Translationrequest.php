<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Translationrequest extends FormRequest
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
            'language_code' => 'required|string|size:2',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'translatable_type' => 'required|in:App\Models\Product,App\Models\Category',
            'translatable_id' => 'required|integer'
        ];
    }
}

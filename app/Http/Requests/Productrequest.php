<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Productrequest extends FormRequest
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
            'slug' => 'required|string|max:255|unique:products,slug,' . ($this->product ? $this->product->id : ''),
            'prix' =>'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'image_url' => 'nullable|file|image|max:2048',
            'translations' => 'required|array',
            'translations.*.language_code' => 'required|string|size:2',
            'translations.*.name' => 'required|string|max:255',
            'translations.*.description' => 'nullable|string'
        ];
    }
}

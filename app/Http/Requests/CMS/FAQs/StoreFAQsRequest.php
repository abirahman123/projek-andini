<?php

namespace App\Http\Requests\CMS\FAQs;

use Illuminate\Foundation\Http\FormRequest;

class StoreFAQsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'question' => 'required|string|min:3|max:100|alpha_specified_symbols',
            'answer' => 'required|string|max:255|alpha_specified_symbols',
            'is_active' => 'required|in:0,1',
        ];
    }
}

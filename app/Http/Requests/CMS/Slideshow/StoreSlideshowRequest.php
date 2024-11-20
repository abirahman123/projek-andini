<?php

namespace App\Http\Requests\CMS\Slideshow;

use Illuminate\Foundation\Http\FormRequest;

class StoreSlideshowRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:100|alpha_spaces',
            'description' => 'required|string|max:255|alpha_spaces',
            'is_active' => 'required|in:0,1',
        ];
    }
}

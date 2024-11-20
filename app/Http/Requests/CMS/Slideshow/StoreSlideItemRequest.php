<?php

namespace App\Http\Requests\CMS\Slideshow;

use Illuminate\Foundation\Http\FormRequest;

class StoreSlideItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        $allowedFormat = getSetting("document_allowed_file_types", 'jpg,jpeg,png');
        $maxFileSize = getSetting('document_max_file_size', 5000);
        if ($this->method() == "PUT") {
            return [
                'title' => 'required|string|min:3|max:100',
                'caption' => 'required|string|max:255',
                'order' => 'required|integer',
                'image' => $this->file('image') ? ['required', 'image', 'mimes:' . $allowedFormat, 'max:' . $maxFileSize] : ["required"]
            ];
        } else {
            return [
                'title' => 'required|string|min:3|max:100|alpha_spaces',
                'caption' => 'required|string|max:255|alpha_spaces',
                'order' => 'required|integer',
                'image' => ['required', 'image', 'mimes:' . $allowedFormat, 'max:' . $maxFileSize]
            ];
        }
    }
}

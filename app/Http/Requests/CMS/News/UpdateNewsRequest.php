<?php

namespace App\Http\Requests\CMS\News;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequest extends FormRequest
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
        $allowedFormat = getSetting("document_allowed_file_types", 'jpg,png');
        $maxFileSize = getSetting('document_max_file_size', 10000);
        return [
            'kategori_berita_id' => 'required',
            'image_url' => $this->file('image_url') ? ['required','file', 'mimes:' . $allowedFormat, 'max:' . $maxFileSize] : ["required"],
            'title' => 'required',
            'description' => 'required'
        ];
    }
}

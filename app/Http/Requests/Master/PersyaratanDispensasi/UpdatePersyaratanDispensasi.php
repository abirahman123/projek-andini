<?php

namespace App\Http\Requests\Master\PersyaratanDispensasi;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePersyaratanDispensasi extends FormRequest
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
        $allowedFormat = getSetting("document_allowed_file_types", 'pdf,jpg,png');
        $maxFileSize = getSetting('document_max_file_size', 10000);
        return [
            'file_pendukung' => $this->file('file_pendukung') ? ['required', 'file', 'mimes:' . $allowedFormat, 'max:' . $maxFileSize] : ["nullable"],
            'nama_persyaratan' => 'required|string|max:255',
            'is_wajib' => 'required|boolean',
        ];
    }
}

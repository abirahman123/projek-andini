<?php

namespace App\Http\Requests\Catin\BerkasPersyaratan;

use Illuminate\Foundation\Http\FormRequest;

class UploadBerkasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'file_path' => request()->file("file_path") ? ['required', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:2048'] : 'required',
            'persyaratan_id' => request()->query('catin_persyaratan_id') ? 'required|exists:ref_persyaratan,id' : '',
            'catin_id' => request()->query('catin_persyaratan_id') ? 'required|exists:catin,id' : ''
        ];
    }

    public function attributes()
    {
        return [
            'file_path' => 'Berkas Persyaratan',
            'persyaratan_id' => 'Persyaratan',
            'catin_id' => 'Calon Pengantin'
        ];
    }
}

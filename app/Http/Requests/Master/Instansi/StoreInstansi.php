<?php

namespace App\Http\Requests\Master\Instansi;

use App\Models\Master\Instansi;
use Illuminate\Foundation\Http\FormRequest;

class StoreInstansi extends FormRequest
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
        $rules = [
            'nama_instansi' => ['required', 'min:3', 'max:200'],
            'nama_pendek' => ['required', 'min:3', 'max:100'],
            'fax' => ['required','starts_with:0,62','digits_between:7,20'],
            'telepon' => ['required', 'digits_between:7,20', 'starts_with:0,62'],
            'email' => ['required', 'email', 'max:100'],
            'website' => ['required', 'url', 'max:100'],
            'alamat' => ['required', 'min:3', 'max:200'],
        ];

        $instansi = Instansi::first();
        if (!$instansi) {
            $rules['logo'] = ['required', 'image', 'max:1024'];
        } else {
            $rules['logo'] = ['required'];
        }

        return $rules;
    }
}

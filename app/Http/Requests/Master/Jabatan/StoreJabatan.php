<?php

namespace App\Http\Requests\Master\Jabatan;

use Illuminate\Foundation\Http\FormRequest;

class StoreJabatan extends FormRequest
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
            'periode_id' => 'required|unique:jabatan_fungsional,periode_id,'.$this->jabatan?->id,
            'kepala_upt' => 'required',
            'pembina_utama_muda' => 'nullable',
            'pembina' => 'nullable',
            'sekretaris' => 'nullable',
            'bendahara' => 'nullable',
            'pengawas' => 'nullable',
            'pengadministrasi_umum' => 'nullable',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'periode_id.unique' => 'Periode tersebut sudah memiliki jabatan fungsional. Silahkan pilih periode lain.',
        ];
    }
}

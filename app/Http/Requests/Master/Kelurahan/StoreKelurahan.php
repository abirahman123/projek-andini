<?php

namespace App\Http\Requests\Master\Kelurahan;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\JsonValidationResponse;

class StoreKelurahan extends FormRequest
{
    use JsonValidationResponse;

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
            'kecamatan_id' => 'required',
            'kode_kelurahan' => 'required|unique:ref_kelurahan',
            'nama_kelurahan' => 'required|unique:ref_kelurahan',
            'latitude' => 'required',
            'longitude' => 'required',
            'keterangan' => 'nullable|string|regex:/^[a-zA-Z0-9\s]+$/|alpha_num_spaces_with_alphabet_and_symbol'
        ];
    }

    public function messages(): array
    {
        return [
            'kecamatan_id.required' => 'kode kecamatan harus di isi',
            'kode_kelurahan.required' => 'Kode Kelurahan harus di isi',

            'kode_kelurahan.unique' => 'Kode Kelurahan sudah dipakai',
            'nama_kelurahan.required' => 'Nama Kelurahan harus di isi',
            'nama_kelurahan.unique' => 'Nama Kelurahan sudah dipakai',
            'latitude.required' => 'Latitude harus di isi',
            'longitude.required' => 'Longitude harus di isi',
            'explanation.string' => 'Keterangan harus berupa string',
            'explanation.alpha_spaces' => 'Keterangan hanya boleh huruf dan spasi',
            'explanation.regex' => 'Keterangan hanya boleh huruf dan angka',
            'explanation.alpha_num_spaces_with_alphabet_and_symbol' => 'Keterangan tidak boleh hanya angka atau simbol, paling tidak harus ada satu huruf',
        ];
    }
}

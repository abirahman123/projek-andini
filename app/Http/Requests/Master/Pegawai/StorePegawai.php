<?php

namespace App\Http\Requests\Master\Pegawai;

use Illuminate\Foundation\Http\FormRequest;

class StorePegawai extends FormRequest
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
            'nip' => 'required|string|unique:pegawai',
            'nama' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'nomor_hp' => 'required|string',
            'email' => 'required|email|unique:pegawai',
            'kecamatan_id' => 'required|exists:ref_kecamatan,id',
            'kelurahan_id' => 'required|exists:ref_kelurahan,id',
            'agama_id' => 'required|exists:ref_agama,id',
            'alamat' => 'required|string',
            // Tambahkan aturan validasi lain sesuai kebutuhan
        ];
    }
}

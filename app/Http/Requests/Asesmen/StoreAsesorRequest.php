<?php

namespace App\Http\Requests\Asesmen;

use Illuminate\Foundation\Http\FormRequest;

class StoreAsesorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'nama' => 'required|max:100',
            'nomor_hp' => 'nullable|numeric|starts_with:0,62|digits_between:10,15',
            'jenis_kelamin' => 'required|in:L,P',
            'kecamatan_id' => 'required|exists:ref_kecamatan,id',
            'kelurahan_id' => 'required|exists:ref_kelurahan,id',
            'alamat' => 'required|max:255',
            'status' => 'sometimes|required|in:0,1',
            'email' => 'required|email|unique:users,email,' . $this->asesor?->user_id,
        ];
        return $rules;
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama harus diisi',
            'nama.string' => 'Nama harus berupa teks',
            'nama.max' => 'Nama tidak boleh lebih dari 100 karakter',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah digunakan',
            'nomor_hp.numeric' => 'Nomor HP harus berupa angka',
            'nomor_hp.starts_with' => 'Nomor HP harus diawali dengan 0 atau 62',
            'nomor_hp.digits_between' => 'Nomor HP harus berjumlah 10-15 digit',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi',
            'jenis_kelamin.in' => 'Jenis kelamin harus Laki-laki atau Perempuan',
            'kecamatan_id.required' => 'Kecamatan harus diisi',
            'kecamatan_id.exists' => 'Kecamatan tidak benar',
            'kelurahan_id.required' => 'Kelurahan harus diisi',
            'kelurahan_id.exists' => 'Kelurahan tidak benar',
            'alamat.required' => 'Alamat harus diisi',
        ];
    }
}
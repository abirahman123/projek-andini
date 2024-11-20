<?php

namespace App\Http\Requests\Asesmen;

use Illuminate\Foundation\Http\FormRequest;

class StoreAsesorJadwalRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'tanggal_assesmen' => 'required|date',
            'assesor_id' => 'required',
            // 'catatan' => 'required|max:255',
            'status_persetujuan' => 'required',
            // 'keterangan' => 'required|max:255',
        ];
        return $rules;
    }

    public function messages(): array
    {
        return [
            'tanggal_assesmen.required' => 'Tanggal assesmen harus diisi',
            'assesor_id.required' => 'Asesor harus diisi',
            'catatan.required' => 'Catatan harus diisi',
            'catatan.max' => 'Catatan tidak boleh lebih dari 255 karakter',
            'status_persetujuan.required' => 'Status Persetujuan Dispensasi harus diisi',
            'keterangan.required' => 'Keterangan harus diisi',
            'keterangan.max' => 'Keterangan tidak boleh lebih dari 255 karakter',
        ];
    }
}

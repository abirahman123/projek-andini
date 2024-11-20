<?php

namespace App\Http\Requests\Asesmen;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCatinAsesmenRequest extends FormRequest
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
        return [
            'lama_hubungan' => 'string|max:255',
            'alasan_menikah' => 'string|max:255',
            'gaya_berpacaran' => 'string|max:255',
            'pekerjaan_catin' => 'string|max:255',
            'penghasilan_catin' => 'string|max:255',
            'persetujuan_keluarga' => 'string|max:255',
            'pola_hubungan' => 'string|max:65535',
            'catatan' => 'string|max:65535',
            'status_rekomendasi' => 'in:DIREKOMENDASIKAN,TIDAK_DIREKOMENDASIKAN',
            'keterangan' => 'string|max:65535',
        ];
    }

    public function messages(): array
    {
        return [
            'lama_hubungan.string' => 'Lama hubungan harus berupa teks',
            'lama_hubungan.max' => 'Lama hubungan tidak boleh lebih dari 255 karakter',
            'alasan_menikah.string' => 'Alasan menikah harus berupa teks',
            'alasan_menikah.max' => 'Alasan menikah tidak boleh lebih dari 255 karakter',
            'gaya_berpacaran.string' => 'Gaya berpacaran harus berupa teks',
            'gaya_berpacaran.max' => 'Gaya berpacaran tidak boleh lebih dari 255 karakter',
            'pekerjaan_catin.string' => 'Pekerjaan catin harus berupa teks',
            'pekerjaan_catin.max' => 'Pekerjaan catin tidak boleh lebih dari 255 karakter',
            'penghasilan_catin.string' => 'Penghasilan catin harus berupa teks',
            'penghasilan_catin.max' => 'Penghasilan catin tidak boleh lebih dari 255 karakter',
            'persetujuan_keluarga.string' => 'Persetujuan keluarga harus berupa teks',
            'persetujuan_keluarga.max' => 'Persetujuan keluarga tidak boleh lebih dari 255 karakter',
            'pola_hubungan.string' => 'Pola hubungan harus berupa teks',
            'pola_hubungan.max' => 'Pola hubungan tidak boleh lebih dari 65535 karakter',
            'penilaian.string' => 'Penilaian harus berupa teks',
            'penilaian.max' => 'Penilaian tidak boleh lebih dari 65535 karakter',
            'catatan.string' => 'Catatan harus berupa teks',
            'catatan.max' => 'Catatan tidak boleh lebih dari 65535 karakter',
            'status_rekomendasi.in' => 'Status rekomendasi harus salah satu dari: DIREKOMENDASIKAN, TIDAK_DIREKOMENDASIKAN',
            'keterangan.string' => 'Keterangan harus berupa teks',
            'keterangan.max' => 'Keterangan tidak boleh lebih dari 65535 karakter',
        ];
    }
}

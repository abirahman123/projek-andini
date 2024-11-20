<?php

namespace App\Http\Requests\Master\Pegawai;

use App\Traits\JsonValidationResponse;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePegawai extends FormRequest
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
            'nip' => 'required|integer|string',
            'nama' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'nomor_hp' => 'required|string',
            'email' => 'required|email',
            'kecamatan_id' => 'required|exists:ref_kecamatan,id',
            'kelurahan_id' => 'required|exists:ref_kelurahan,id',
            'agama_id' => 'required|exists:ref_agama,id',
            'alamat' => 'required|string',
        ];
    }
}

<?php

namespace App\Http\Requests\Catin\PengajuanDispensasi;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePengajuanDispensasiRequest extends FormRequest
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
        $template = [
            'nama_lengkap' => 'required|max:255|alpha_spaces',
            'nik' => 'required|numeric|digits:16|unique:catin,nik,' . $this->route('pengajuan_dispensasi')->id . ',dispensasi_id',
            'tempat_lahir' => 'required|string|max:255|alpha_spaces',
            'tanggal_lahir' => 'required|date',
            'nomor_hp' => 'required|numeric|digits_between:10,15',
            'pekerjaan' => 'required|max:255|alpha_num_spaces',
            'kecamatan_id' => 'required|exists:ref_kecamatan,id',
            'kelurahan_id' => 'required|exists:ref_kelurahan,id',
            'alamat' => 'required|max:255|alpha_num_spaces_with_alphabet_and_symbol',
            'agama_id' => 'required|exists:ref_agama,id',
            'pendidikan_id' => 'required|exists:ref_pendidikan,id',
            'nama_ayah' => 'nullable|max:255|alpha_spaces',
            'nama_ibu' => 'nullable|max:255|alpha_spaces',
            'nama_wali' => 'max:255|alpha_spaces',
            'pas_foto' => 'required',
        ];

        $rules = [];
        $loop = ['pria_', 'wanita_'];

        foreach ($loop as $gender) {
            $otherGender = $gender == 'pria_' ? 'wanita_' : 'pria_';
            foreach ($template as $key => $value) {

                if ($key == 'nik') {
                    $value .= '|different:' . $otherGender . 'nik';
                }

                if ($key == 'nama_wali') {
                    if ($gender == 'wanita_') {
                        $value = 'required|' . $value;
                    } else {
                        $value = 'nullable|' . $value;
                    }
                }

                if ($key == 'pas_foto') {
                    if ($this->file($gender . 'pas_foto')) {
                        $value .= '|image|mimes:jpeg,png,jpg|max:2048';
                    }
                }

                $rules[$gender . $key] = $value;
            }
        }

        return $rules;
    }

    public function attributes(): array
    {
        $template = [
            'nama_lengkap' => 'Nama Lengkap',
            'nik' => 'NIK',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'nomor_hp' => 'Nomor HP',
            'pekerjaan' => 'Pekerjaan',
            'kecamatan_id' => 'Kecamatan',
            'kelurahan_id' => 'Kelurahan',
            'alamat' => 'Alamat',
            'agama_id' => 'Agama',
            'pendidikan_id' => 'Pendidikan',
            'nama_ayah' => 'Nama Ayah',
            'nama_ibu' => 'Nama Ibu',
            'nama_wali' => 'Nama Wali',
            'pas_foto' => 'Pas Foto',
        ];

        $attributes = [];
        $loop = ['pria_', 'wanita_'];

        foreach ($loop as $gender) {
            foreach ($template as $key => $value) {
                $attributes[$gender . $key] = $value . ' Calon Pengantin ' . ucfirst(str_replace('_', ' ', $gender));
            }
        }

        return $attributes;
    }
}

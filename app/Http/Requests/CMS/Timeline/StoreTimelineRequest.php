<?php

namespace App\Http\Requests\CMS\Timeline;

use Illuminate\Foundation\Http\FormRequest;

class StoreTimelineRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'tahun_ajaran_id' => 'required||exists:ref_tahun_ajaran,id|unique:timeline_aktivitas,tahun_ajaran_id,' . $this->id,
            'tanggal_mulai_pendaftaran' => 'required|date|before:tanggal_selesai_pendaftaran|before:tanggal_mulai_administrasi|before:tanggal_selesai_administrasi|before:tanggal_mulai_assesmen|before:tanggal_seleksi_evaluasi_diri|after:today',
            'tanggal_selesai_pendaftaran' => 'required|date|after:tanggal_mulai_pendaftaran|after:today|before:tanggal_mulai_administrasi|before:tanggal_selesai_administrasi|before:tanggal_mulai_assesmen|before:tanggal_seleksi_evaluasi_diri',
            'tanggal_mulai_administrasi' => 'required|date|after:today|after:tanggal_mulai_pendaftaran|after:tanggal_selesai_pendaftaran|before:tanggal_selesai_administrasi|before:tanggal_mulai_assesmen|before:tanggal_seleksi_evaluasi_diri',
            'tanggal_selesai_administrasi' => 'required|date|after:today|after:tanggal_mulai_pendaftaran|after:tanggal_selesai_pendaftaran|after:tanggal_mulai_administrasi|before:tanggal_mulai_assesmen|before:tanggal_seleksi_evaluasi_diri',
            'tanggal_mulai_assesmen' => 'required|date|after:today|after:tanggal_mulai_pendaftaran|after:tanggal_selesai_pendaftaran|after:tanggal_mulai_administrasi|after:tanggal_selesai_administrasi|before:tanggal_seleksi_evaluasi_diri',
            'tanggal_seleksi_evaluasi_diri' => 'required|date|after:today|after:tanggal_mulai_pendaftaran|after:tanggal_selesai_pendaftaran|after:tanggal_mulai_administrasi|after:tanggal_selesai_administrasi|after:tanggal_mulai_assesmen',
        ];
    }
}

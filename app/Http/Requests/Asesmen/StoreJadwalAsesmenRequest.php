<?php

namespace App\Http\Requests\Asesmen;

use Illuminate\Foundation\Http\FormRequest;

class StoreJadwalAsesmenRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'register_id' => 'required|exists:register,id',
            'periode_id' => 'required|exists:periode,id',
            'tanggal_asesmen' => 'nullable|date',
            'catatan' => 'nullable|string',
            'status' => 'required|in:SUBMITTED,REVISED,APPROVED,REJECTED',
            'keterangan' => 'nullable|string',
            'created_by' => 'nullable|integer',
            'updated_by' => 'nullable|integer',
        ];
    }

    public function messages()
    {
        return [
            'register_id.required' => 'Register harus diisi',
            'register_id.exists' => 'Register tidak benar',
            'periode_id.required' => 'Periode harus diisi',
            'periode_id.exists' => 'Periode tidak benar',
            'status.required' => 'Status harus diisi',
            'status.in' => 'Status harus salah satu dari: Menunggu persetujuan, Perlu revisi, Disetujui, Ditolak',
        ];
    }
}
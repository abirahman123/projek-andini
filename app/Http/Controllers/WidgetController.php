<?php

namespace App\Http\Controllers;

use App\Models\AsesmenJadwal;
use Illuminate\Http\Request;

class WidgetController extends Controller
{
    public function getWidgetData()
    {
        $jumlah_pengajuan = AsesmenJadwal::count();
        $jumlah_disetujui = AsesmenJadwal::where('status', 'APPROVED')->count();
        $jumlah_ditolak = AsesmenJadwal::where('status', 'REJECTED')->count();
        $jumlah_direvisi = AsesmenJadwal::where('status', 'REVISED')->count();

        return [
            'jumlah_pengajuan' => $jumlah_pengajuan,
            'jumlah_disetujui' => $jumlah_disetujui,
            'jumlah_ditolak' => $jumlah_ditolak,
            'jumlah_direvisi' => $jumlah_direvisi,
        ];
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Asesor;
use App\Models\Dashboard\Jadwal;
use App\Models\Dashboard\news;
use App\Models\Dashboard\Pengajuan;
use App\Models\Dashboard\RefKecamatan;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
        $jumlah_jadwal = Jadwal::jadwal(); // Mengambil jumlah jadwal dari model Jadwal
        $jumlah_data = Asesor::jumlahData(); // Mengambil jumlah data dari model Asesor, contoh penambahan untuk ilustrasi
        $jumlah_pengajuan = Pengajuan::pengajuan();
        $jadwal = Jadwal::all();
        $news = News::all();
        $jumlah_disetujui = Pengajuan::disetujui();
        $jumlah_pengajuan_per_kecamatan = DB::table('catin')
            ->select('kecamatan_id', DB::raw('COUNT(*) as jumlah_pengajuan'))
            ->groupBy('kecamatan_id')
            ->get();

        $nama_kecamatan = RefKecamatan::all('nama_kecamatan', 'id')->toArray();;
        return view('pages.admin.dashboard', [
            'jumlah_jadwal' => $jumlah_jadwal,
            'jumlah_data' => $jumlah_data, // Menyimpan jumlah data asesor dalam variabel 'jumlah_data'
            'jumlah_pengajuan' => $jumlah_pengajuan,
            'jumlah_disetujui' => $jumlah_disetujui,
            'jadwal' => $jadwal,
            'news' => $news,
            'jumlah_pengajuan_per_kecamatan' => $jumlah_pengajuan_per_kecamatan,
            'nama_kecamatan' => json_encode($nama_kecamatan),
            // tambahkan variabel jumlah_pengajuan_per_kecamatan ke dalam array
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AsesmenJadwal;
use App\DataTables\Asesor\AsesmenJadwalDataTable;
use App\Models\User\Role;
use Illuminate\Support\Facades\Auth;
use App\Models\Dashboard\Asesor;
use App\Models\Dashboard\Jadwal;
use App\Models\Dashboard\Pengajuan;
use App\Models\Dashboard\RefKecamatan;
use App\Models\Dashboard\News;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Catin\DashboardController as CatinDashboard;
use App\Http\Controllers\Asesor\DashboardController as AsesorDashboard;
use App\Http\Controllers\PA\DashboardController as PADashboard;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;

class HomeController extends Controller
{
    /**
     * Dashboard routing by roles
     *
     * @return mixed
     */
    public function index(): mixed
    {
        $user = auth()->user();
        switch ($user->roles[0]->name) {
            case 'catin':
                $catin = new CatinDashboard();
                return $catin->index();

            case 'asesor':
                $asesor = new AsesorDashboard();
                return $asesor->index();

            case 'pengadilan-agama':
                $pa = new PADashboard();
                return $pa->index();

            case 'admin':
                $admin = new AdminDashboard();
                return $admin->index();

            default:
                abort(404);
        }
    }





    public function widget()
    {
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
            'jumlah_data' => $jumlah_data,
            'jumlah_pengajuan' => $jumlah_pengajuan,
            'jumlah_disetujui' => $jumlah_disetujui,
            'jadwal' => $jadwal,
            'news' => $news,
            'jumlah_pengajuan_per_kecamatan' => $jumlah_pengajuan_per_kecamatan,
            'nama_kecamatan' => json_encode($nama_kecamatan),
        ]);
    }
}

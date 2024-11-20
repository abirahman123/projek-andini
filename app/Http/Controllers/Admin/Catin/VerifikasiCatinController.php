<?php

namespace App\Http\Controllers\Admin\Catin;

use App\DataTables\Catin\VerifikasiCatinDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Asesmen\StoreAsesorJadwalRequest;
use App\Models\Assesor\CatinPersyaratan;
use App\Models\Catin;
use App\Models\Dispensasi;
use App\Models\Master\Periode;
use App\Models\Asesmen\JadwalAsesmen;
use App\Models\Asesmen\PenilaianAsesmen;
use App\Models\Master\PersyaratanDispensasi;
use Illuminate\Http\Request;
use ResponseFormatter;

class VerifikasiCatinController extends Controller
{
    protected $modules = ["catin.verifikasi-catin"];
    protected $actions = [];

    public function index(VerifikasiCatinDataTable $datatable)
    {
        $filterStatus = request()->get('status');
        if ($filterStatus) {
            $dataTable = new VerifikasiCatinDataTable($filterStatus);
        }
        return $datatable->render('pages.admin.verifikasi-catin.index');
    }

    public function verify(StoreAsesorJadwalRequest $request, Dispensasi $dispensasi)
    {
        $periode_aktif = Periode::getCurrent();
        $dispensasi->update([
            'status_persetujuan' => $request->status_persetujuan,
        ]);

        $jadwalAssesment = JadwalAsesmen::create([
            'dispensasi_id' => $dispensasi->id,
            'periode_id' => $periode_aktif->id,
            'tanggal_asesmen' => $request->tanggal_assesmen,
            'status' => 'SUBMITTED',
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        $asesors = $request->assesor_id;
        foreach ($asesors as $asesor) {
            $assesmentPenilaian = PenilaianAsesmen::create([
                'asesmen_id' => $jadwalAssesment->id,
                'asesor_id' => $asesor,
            ]);
        }

        return ResponseFormatter::success('Verifikasi berhasil disetujui!', 200);
    }

    public function reset(Dispensasi $dispensasi)
    {
        $dispensasi->update([
            'status_persetujuan' => 'SUBMITTED',
        ]);
        $periode_aktif = Periode::getCurrent();
        $jadwalAssesment = $dispensasi->jadwalAsesmen()->where('periode_id', $periode_aktif->id)->first();
        PenilaianAsesmen::where('asesmen_id', $jadwalAssesment->id)->delete();
        JadwalAsesmen::where('dispensasi_id', $dispensasi->id)->delete();

        return ResponseFormatter::success('Reset dispensasi berhasil!', 200);
    }

    public function show(Dispensasi $verifikasi_catin)
    {
        $catin_pria = Catin::where('dispensasi_id', $verifikasi_catin->id)->where('jenis_kelamin', 'L')->first();
        $persyaratan_catin_pria =  $catin_pria->jumlahBerkasWajib();
        $catin_wanita = Catin::where('dispensasi_id', $verifikasi_catin->id)->where('jenis_kelamin', 'P')->first();
        $persyaratan_catin_wanita = $catin_wanita->jumlahBerkasWajib();
        $semua_persyaratan = PersyaratanDispensasi::where('is_wajib', 1)->count();
        // dd($semua_persyaratan, $persyaratan_catin_pria, $persyaratan_catin_wanita);
        return view('pages.admin.verifikasi-catin.show', compact('verifikasi_catin', 'persyaratan_catin_pria', 'persyaratan_catin_wanita', 'semua_persyaratan'));
    }

    public function edit($id)
    {
        $persyaratan_catin = CatinPersyaratan::find($id);
        return response()->json($persyaratan_catin);
    }

    public function update(Request $request, $id)
    {
        $catin_persyaratan = CatinPersyaratan::find($id);
        $catin_persyaratan->status = $request->status_verifikasi;
        $catin_persyaratan->keterangan = $request->catin_keterangan;
        $catin_persyaratan->save();
        return response()->json(['message' => 'Persyaratan berhasil diverifikasi']);
    }

    public function persyaratanCatin(Catin $catin)
    {
        $persyaratan_catins = $catin->berkas->all();
        $semua_persyaratan = PersyaratanDispensasi::all();
        return view('pages.admin.verifikasi-catin.edit', compact('catin', 'persyaratan_catins', 'semua_persyaratan'));
    }
}

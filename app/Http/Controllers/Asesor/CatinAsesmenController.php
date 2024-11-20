<?php

namespace App\Http\Controllers\Asesor;

use App\DataTables\Asesor\CatinAsesmenDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Asesmen\UpdateCatinAsesmenRequest;
use App\Models\Admin\Asesor;
use App\Models\AsesmenPenilaian;
use App\Models\Assesor\CatinPersyaratan;
use App\Models\Master\Periode;
use App\Models\Register;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Dompdf\Options;
use Dompdf\Dompdf;
use ResponseFormatter;

class CatinAsesmenController extends Controller
{
    protected $modules = ["asesor.catin-asesmen"];
    protected $actions = [];

    public function index(CatinAsesmenDataTable $dataTable)
    {
        return $dataTable->render('pages.asesor.catin-asesmen.index', ['modules' => $this->modules, 'actions' => $this->actions]);
    }

    public function show(Register $catin_asesmen)
    {
        $pria = $catin_asesmen->dispensasi->catin_pria->id;
        $wanita = $catin_asesmen->dispensasi->catin_wanita->id;

        $persyaratan = (object) [
            'pria' => CatinPersyaratan::where('catin_id', $pria)->get(),
            'wanita' => CatinPersyaratan::where('catin_id', $wanita)->get(),
        ];

        $asesmen = $this->isAsesmenPenilaianExists(Auth::id());

        $data = (object) [
            'catin_asesmen' => $catin_asesmen,
            'persyaratan' => $persyaratan,
            'asesmen' => $asesmen,
            'asesmen_penilaian' => $catin_asesmen->dispensasi->asesmen_jadwal->asesmen_penilaian
        ];

        return view('pages.asesor.catin-asesmen.show', ['data' => $data, 'modules' => $this->modules, 'actions' => $this->actions]);
    }

    public function edit(AsesmenPenilaian $catin_asesmen)
    {
        return response()->json([
            ...collect($catin_asesmen->toArray())
        ]);
    }

    public function update(UpdateCatinAsesmenRequest $request, AsesmenPenilaian $catin_asesmen)
    {
        if (now()->gt($catin_asesmen->asesmen_jadwal->tanggal_asesmen)) {
            return ResponseFormatter::error("Asesmen tidak dapat disimpan, karena asesmen telah berakhir", code: 500);
        }

        DB::beginTransaction();
        try {
            if ($catin_asesmen->updateOrFail($request->validated())) {
                DB::commit();
                return ResponseFormatter::success("Asesmen berhasil disimpan");
            } else {
                DB::rollBack();
                return ResponseFormatter::error("Gagal menyimpan asesmen", code: 500);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return ResponseFormatter::error("Gagal menyimpan asesmen", code: 500);
        }
    }

    public function printAsesmenPenilaian(AsesmenPenilaian $catin_asesmen)
    {
        if ($this->isAsesmenPenilaianExists(Auth::id())) {
            $data = (object) [
                'catin' => (object) [
                    'pria' => (object) [
                        'nama' => $catin_asesmen->asesmen_jadwal->dispensasi->catin_pria->nama_lengkap,
                        'alamat' => $catin_asesmen->asesmen_jadwal->dispensasi->catin_pria->alamat,
                        'kecamatan' => $catin_asesmen->asesmen_jadwal->dispensasi->catin_pria->kecamatan->nama_kecamatan,
                        'kelurahan' => $catin_asesmen->asesmen_jadwal->dispensasi->catin_pria->kelurahan->nama_kelurahan,
                        'umur' => now()->diffInYears($catin_asesmen->asesmen_jadwal->dispensasi->catin_pria->tanggal_lahir),
                    ],
                    'wanita' => (object) [
                        'nama' => $catin_asesmen->asesmen_jadwal->dispensasi->catin_wanita->nama_lengkap,
                        'alamat' => $catin_asesmen->asesmen_jadwal->dispensasi->catin_wanita->alamat,
                        'kecamatan' => $catin_asesmen->asesmen_jadwal->dispensasi->catin_wanita->kecamatan->nama_kecamatan,
                        'kelurahan' => $catin_asesmen->asesmen_jadwal->dispensasi->catin_wanita->kelurahan->nama_kelurahan,
                        'umur' => now()->diffInYears($catin_asesmen->asesmen_jadwal->dispensasi->catin_wanita->tanggal_lahir),
                    ],
                ],
                'penilaian' => (object) [
                    'lama_hubungan' => $catin_asesmen->lama_hubungan,
                    'alasan_menikah' => $catin_asesmen->alasan_menikah,
                    'gaya_berpacaran' => $catin_asesmen->gaya_berpacaran,
                    'pekerjaan_catin' => $catin_asesmen->pekerjaan_catin,
                    'penghasilan_catin' => $catin_asesmen->penghasilan_catin,
                    'persetujuan_keluarga' => $catin_asesmen->persetujuan_keluarga,
                    'pola_hubungan' => $catin_asesmen->pola_hubungan,
                    'catatan' => $catin_asesmen->catatan,
                    'status_rekomendasi' => $catin_asesmen->status_rekomendasi,
                    'keterangan' => $catin_asesmen->keterangan,
                ],
                'kepala_upt' => (object) [
                    'nip' => $catin_asesmen->asesmen_jadwal->periode->jabatanfungsional->as_kepala_upt->nip,
                    'nama' => $catin_asesmen->asesmen_jadwal->periode->jabatanfungsional->as_kepala_upt->nama
                ],
                'asesor' => $catin_asesmen->asesor->nama,
                'wali' => $catin_asesmen->asesmen_jadwal->dispensasi->catin_wanita->nama_wali,
            ];

            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isRemoteEnabled', true);

            $dompdf = new Dompdf($options);
            $dompdf->loadHtml(view('pages.asesor.catin-asesmen.prints.asesmen-penilaian', compact('data', 'data')));
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();

            $dompdf->stream('Asesmen-Penilaian', array("Attachment" => 1));
        } else {
            return redirect()->back()->with('error', 'Data asesmen penilaian tidak ditemukan');
        }
    }

    protected function isAsesmenPenilaianExists($user_id)
    {
        return AsesmenPenilaian::where('asesor_id', Asesor::where('user_id', $user_id)->first()->id)
            ->whereNotNull('status_rekomendasi')
            ->exists();
    }
}

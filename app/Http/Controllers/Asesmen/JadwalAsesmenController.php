<?php

namespace App\Http\Controllers\Asesmen;

use App\DataTables\Asesmen\AsesorPenilaianDataTable;
use App\DataTables\Asesmen\JadwalAsesmenDataTable;
use App\Helpers\StatusHelper;
use Dompdf\Options;
use ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Asesmen\JadwalAsesmen;
use App\Http\Requests\Asesmen\StoreJadwalAsesmenRequest;
use App\Models\Master\Periode;
use App\Models\Register;
use Dompdf\Dompdf;

class JadwalAsesmenController extends Controller
{
    protected $modules = ["asesmen"];

    public function index(JadwalAsesmenDataTable $dataTable)
    {
        return $dataTable->render('pages.admin.asesmen.jadwal-asesmen.index');
    }

    public function create()
    {

        return view('pages.admin.asesmen.jadwal-asesmen.create');
    }

    public function store(StoreJadwalAsesmenRequest $request)
    {
        $validatedData = $request->validated();
        JadwalAsesmen::create($validatedData);
        return ResponseFormatter::created("Berhasil Menambahkan Jadwal Asesmen");
    }

    public function show(JadwalAsesmen $jadwalasesmen)
    {
        $jadwalasesmen->load('periode', 'dispensasi.register');
        $catinPria = $jadwalasesmen->dispensasi->catin()
            ->where('jenis_kelamin', 'L')
            ->with(['agama', 'kelurahan', 'kecamatan', 'pendidikan'])
            ->first();
        $catinWanita = $jadwalasesmen->dispensasi->catin()
            ->where('jenis_kelamin', 'P')
            ->with(['agama', 'kelurahan', 'kecamatan', 'pendidikan'])
            ->first();

        $status = StatusHelper::formatStatus($jadwalasesmen->status);
        $dataTable = new AsesorPenilaianDataTable($jadwalasesmen->id);

        return $dataTable->render(
            'pages.admin.asesmen.jadwal-asesmen.show',
            compact('jadwalasesmen', 'status', 'catinPria', 'catinWanita')
        );
    }

    public function update(StoreJadwalAsesmenRequest $request, JadwalAsesmen $jadwalasesmen)
    {
        $validatedData = $request->validated();
        $jadwalasesmen->update($validatedData);
        return ResponseFormatter::created("Berhasil Mengubah Jadwal Asesmen");
    }

    public function destroy(string $id)
    {
        $jadwalasesmen = JadwalAsesmen::findorFail($id);
        $jadwalasesmen->delete();
        return ResponseFormatter::created('Berhasil Menghapus Jadwal Asesmen');
    }

    public function printHasilAsesmen(JadwalAsesmen $jadwalasesmen)
    {
        $jadwalasesmen = $jadwalasesmen->loadMissing(['dispensasi', 'penilaian']);
        $jabatanFungsional = Periode::find($jadwalasesmen->periode_id)->jabatanFungsional
            ->loadMissing(['as_kepala_upt']);
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml(view('pages.admin.asesmen.jadwal-asesmen.print.hasil-asesmen', compact('jadwalasesmen', 'jabatanFungsional')));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        $dompdf->stream('Asesmen-Rekomendasi-Nikah', array("Attachment" => 1));
    }

    public function printSuratDispensasiNikah(JadwalAsesmen $jadwalasesmen)
    {
        $logo = null;
        try {
            $logo = "data:image/png;base64," . base64_encode(file_get_contents(public_path("assets/images/logos/logo-kab-blitar.jpg")));
        } catch (\Throwable) {
        }

        $jadwalasesmen = $jadwalasesmen->loadMissing(['dispensasi', 'penilaian']);
        $jabatanFungsional = Periode::find($jadwalasesmen->periode_id)->jabatanFungsional
            ->loadMissing(['as_pembina_utama_muda', 'as_pembina']);
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml(view('pages.admin.asesmen.jadwal-asesmen.print.surat-dispensasi-nikah', compact('jadwalasesmen', 'logo', 'jabatanFungsional')));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $dompdf->stream('Surat-Dispensasi-Nikah', array("Attachment" => 1));
    }
}

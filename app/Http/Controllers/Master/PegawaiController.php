<?php

namespace App\Http\Controllers\Master;

use App\DataTables\Master\PegawaiDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Master\Pegawai\StorePegawai;
use App\Http\Requests\Master\Pegawai\UpdatePegawai;
use Illuminate\Http\Request;
use App\Models\Master\Pegawai;
use App\Models\Master\Agama;
use App\Models\Master\Kecamatan;
use App\Models\Master\Kelurahan;
use App\Models\Master\JabatanFungsional;
use ResponseFormatter;

class PegawaiController extends Controller
{

    public function getKelurahan()
    {
        $kelurahan = Kelurahan::all(); // Sesuaikan dengan metode pengambilan data kelurahan yang sesuai

        return response()->json($kelurahan);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(PegawaiDataTable $dataTable)
    {
        $agama = Agama::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $jabatan = JabatanFungsional::all();
        return $dataTable->render('pages.admin.master.pegawai.index', compact('agama', 'jabatan', 'kecamatan', 'kelurahan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePegawai $request)
    {

        Pegawai::create($request->all());
        return ResponseFormatter::created("Pegawai berhasil di tambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        return $this->edit($pegawai);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        return response()->json([
            'kecamatan_id' => [
                'value' => $pegawai->kecamatan_id,
                'label' => $pegawai->kecamatan->nama_kecamatan,
            ],
            'kelurahan_id' => [
                'value' => $pegawai->kelurahan_id,
                'label' => $pegawai->kelurahan->nama_kelurahan,
            ],
            ...collect($pegawai)->except(['kecamatan_id','kelurahan_id'])->toArray(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePegawai $request, Pegawai $pegawai)
    {
        $pegawai->update($request->all());
        return ResponseFormatter::created("Pegawai Berhasil Di Update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return ResponseFormatter::created('Pegawai Berhasil Dihapus');
    }
}

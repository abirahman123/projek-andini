<?php

namespace App\Http\Controllers;

use App\Http\Requests\Master\Jabatan\StoreJabatan;
use App\Models\Master\JabatanFungsional;
use App\Models\Master\Periode;
use ResponseFormatter;

class JabatanFungsionalController extends Controller
{
    public function index()
    {
        $jabatan = JabatanFungsional::where('periode_id', Periode::getCurrent()['id'])->get();
        if($jabatan->isEmpty()) {
            return $this->create();
        } else {
            return $this->edit($jabatan->first());
        }
    }

    public function store(StoreJabatan $request)
    {
        try {
            JabatanFungsional::create($request->all());
            return ResponseFormatter::created("Jabatan Fungsional berhasil ditambahkan");
        } catch (\Exception $e) {
            return ResponseFormatter::error('Gagal menambah data jabatan, server error', [
                'trace' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(StoreJabatan $request, JabatanFungsional $jabatan)
    {
        $jabatan->update($request->all());
        return ResponseFormatter::created("Jabatan Fungsional berhasil diubah");
    }

    public function create()
    {
        $periode = Periode::getCurrent();
        return view('pages.admin.master.jabatan-fungsional.create', compact('periode'));
    }

    public function edit(JabatanFungsional $jabatan)
    {
        $periode = Periode::getCurrent();
        $jabatan->loadMissing('periode', 'as_kepala_upt', 'as_pembina_utama_muda', 'as_pembina', 'as_sekretaris', 'as_bendahara', 'as_pengawas', 'as_pengadministrasi_umum');
        return view('pages.admin.master.jabatan-fungsional.index', compact('jabatan', 'periode'));
    }
}

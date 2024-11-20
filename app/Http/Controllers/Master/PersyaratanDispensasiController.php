<?php

namespace App\Http\Controllers\Master;

use ResponseFormatter;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Master\PersyaratanDispensasi;
use App\Models\Master\Periode;
use App\DataTables\Master\PersyaratanDispensasiDataTable;
use App\DataTables\Master\SyaratDispensasiDataTable;
use App\Http\Requests\Master\PersyaratanDispensasi\StorePersyaratanDispensasi;
use App\Http\Requests\Master\PersyaratanDispensasi\UpdatePersyaratanDispensasi;

class PersyaratanDispensasiController extends Controller
{
    protected $modules = ['data-master', 'data-master.persyaratan-dispensasi'];
    public function index(PersyaratanDispensasiDataTable $dataTable,  Request $request)
    {
        if ($request->periodeId != null) {
            $periodes = Periode::all();
            return $dataTable->with('periodeId', $request->periodeId)
                ->render('pages.admin.master.persyaratan-dispensasi.index', compact('periodes'));
        } else if ($request->periodeId === null) {
            $periodes = Periode::all();
            return $dataTable->render('pages.admin.master.persyaratan-dispensasi.index', compact('periodes'));
        }
    }

    public function store(StorePersyaratanDispensasi $request)
    {
        try {
            if ($request->hasFile('file_pendukung')) {
                $uploadedFile = $request->file('file_pendukung');
                $fileName = time() . '_' . $uploadedFile->getClientOriginalName();
                $filePath = $uploadedFile->storeAs('Persyaratan_Dispensasi', $fileName, 'public');
                $request->merge(['file_pendukung' => $filePath]);
            }

            $request->validated();
            $persyaratandispensasi = PersyaratanDispensasi::create(
                [
                    'periode_id' => Periode::getCurrent()->id,
                    'file_pendukung' => $filePath ?? null,
                    'nama_persyaratan' => $request->nama_persyaratan,
                    'keterangan' => $request->keterangan,
                    'is_wajib' => $request->is_wajib
                ]
            );

            return ResponseFormatter::created('Persyaratan Dispensasi Berhasil Ditambahkan', $persyaratandispensasi);
        } catch (\Throwable $th) {
            return ResponseFormatter::error("Gagal Menambahkan Persyaratan Dispensasi, server error", [
                'trace' => $th->getMessage()
            ], 500);
        }
    }

    public function update(UpdatePersyaratanDispensasi $request, string $id)
    {
        try {
            $persyaratandispensasi = PersyaratanDispensasi::findOrFail($id);
            $validatedData = $request->validated();
            $filePath = $persyaratandispensasi->file_pendukung;
            if ($request->hasFile('file_pendukung')) {
                if ($filePath) {
                    Storage::disk('public')->delete($persyaratandispensasi->file_pendukung);
                }

                $uploadedFile = $request->file('file_pendukung');
                $fileName = time() . '_' . $uploadedFile->getClientOriginalName();
                $filePath = $uploadedFile->storeAs('Persyaratan_Dispensasi', $fileName, 'public');
                $request->merge(['file_pendukung' => $filePath]);
            }
            $persyaratandispensasi->update(
                [
                    'file_pendukung' => $filePath ?? null,
                    'nama_persyaratan' => $validatedData['nama_persyaratan'],
                    'keterangan' => $request->keterangan,
                    'is_wajib' => $request->is_wajib
                ]
            );

            return ResponseFormatter::created('Persyaratan Dispensasi Berhasil Ditambahkan', $persyaratandispensasi);
        } catch (\Throwable $th) {
            dd($th, $request->all());
            return ResponseFormatter::error("Gagal Menambahkan Persyaratan Dispensasi, server error", [
                'trace' => $th->getMessage()
            ], 500);
        }
    }

    public function destroy(PersyaratanDispensasi $persyaratanDispensasi)
    {
        try {
            $filePendukung = $persyaratanDispensasi->file_pendukung;
            if (!empty($filePendukung)) {
                Storage::disk('public')->delete($filePendukung);
            }
            $persyaratanDispensasi->delete();

            return ResponseFormatter::success('Persyaratan Dispensasi Berhasil Dihapus');
        } catch (\Exception $e) {
            return ResponseFormatter::error('Gagal Menghapus Persyaratan Dispensasi, server error', [
                'trace' => $e->getMessage()
            ], 500);
        }
    }

    public function edit(PersyaratanDispensasi $persyaratanDispensasi)
    {
        return response()->json([
            ...collect($persyaratanDispensasi->toArray())->except(['file_pendukung', 'periode_id']),
            'file_pendukung' => $persyaratanDispensasi->file_pendukung ? getFileInfo($persyaratanDispensasi->file_pendukung) : null,
            'nama_persyaratan' => $persyaratanDispensasi->nama_persyaratan,
            'keterangan' => $persyaratanDispensasi->keterangan,
            'periode_id' =>  [
                'value' => $persyaratanDispensasi->periode_id,
                'label' => $persyaratanDispensasi->periode->periode
            ],
            'is_wajib' => $persyaratanDispensasi->is_wajib
        ]);
    }

    public function download($id)
    {
        $file_pendukung = PersyaratanDispensasi::find($id);
        return $file_pendukung->download();
    }
}

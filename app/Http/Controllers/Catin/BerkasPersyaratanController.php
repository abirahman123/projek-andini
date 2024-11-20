<?php

namespace App\Http\Controllers\Catin;

use App\DataTables\Catin\BerkasPersyaratanCatinDataTable;
use App\DataTables\Catin\BerkasPersyaratanDetailDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Catin\BerkasPersyaratan\UploadBerkasRequest;
use App\Models\Assesor\CatinPersyaratan;
use App\Models\Catin;
use App\Models\Dispensasi;
use App\Models\Master\PersyaratanDispensasi;
use App\Models\Rpl\FormulirBerkasPersyaratan;

class BerkasPersyaratanController extends Controller
{
    protected $modules = ['catin.berkas-persyaratan'];

    public function index(BerkasPersyaratanCatinDataTable $dataTable) {
        return $dataTable->render('pages.catin.berkas-persyaratan.index');
    }

    public function edit(Dispensasi $berkas_persyaratan) {
        $persyaratanPria = new BerkasPersyaratanDetailDataTable($berkas_persyaratan->catin_pria);
        $persyaratanWanita = new BerkasPersyaratanDetailDataTable($berkas_persyaratan->catin_wanita);
        return view('pages.catin.berkas-persyaratan.edit', [
            'berkas_persyaratan' => $berkas_persyaratan,
            'persyaratanPria' => $persyaratanPria->html(),
            'persyaratanWanita' => $persyaratanWanita->html()
        ]);
    }

    public function detail(Catin $catin) {
        // reject if not ajax request
        if (!request()->ajax()) {
            abort(404);
        }
        $dataTable = new BerkasPersyaratanDetailDataTable($catin);
        return $dataTable->render('pages.catin.berkas-persyaratan.index', compact('catin'));
    }

    public function edit_detail(CatinPersyaratan $persyaratan)
    {
        return response()->json([
            ...collect($persyaratan->toArray())
        ]);
    }

    public function upload(UploadBerkasRequest $request, CatinPersyaratan $id) {
        try {
            $validated = $request->validated();
            if (!isset($validated['persyaratan_id'])) {
                $id->file_path = $validated['file_path'];
                $id->status = 'SUBMITTED';
                $id->save();
            } else {
                $id->create($validated);
            }
            return \ResponseFormatter::success('Berkas Persyaratan berhasil diunggah');
        } catch (\Exception $e) {
            return \ResponseFormatter::error('Gagal mengunggah Berkas Persyaratan', code: 500);
        }
    }

}

<?php

namespace App\Http\Controllers\Kelurahan;

use ResponseFormatter;
use Illuminate\Support\Str;
use App\Traits\HasReference;
use Illuminate\Http\Request;
use App\Models\Master\Periode;
use App\Models\Setting\Access;
use App\Models\Master\Kelurahan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\DataTables\Admin\KelurahanDataTable;
use App\Http\Requests\Menu\StoreMenuRequest;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\Master\Kelurahan\StoreKelurahan;
use App\Http\Requests\Master\Kelurahan\UpdateKelurahan;

class KelurahanController extends Controller

{
    public function index()
    {
        $dataTable = new KelurahanDataTable();
        return $dataTable->render('pages.admin.master.kelurahan.index');
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
    public function store(StoreKelurahan $request)
    {
        Kelurahan::create($request->all());
        return ResponseFormatter::created("Kelurahan Berhasil Ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelurahan $kelurahan)
    {
        return response()->json([
            ...collect($kelurahan->toArray())->except(['created_at', 'updated_at']),
            'kecamatan_id' => [
                'value' => $kelurahan->kecamatan_id,
                'label' => $kelurahan->kecamatan->nama_kecamatan
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKelurahan $request, string $id)
    {
        $kelurahan = Kelurahan::find($id);
        $kelurahan->update($request->all());
        return ResponseFormatter::created("Kelurahan Berhasil Diubah");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kelurahan = Kelurahan::find($id);
        $kelurahan->delete();
        return ResponseFormatter::created('Kelurahan Berhasil Dihapus');
    }
}

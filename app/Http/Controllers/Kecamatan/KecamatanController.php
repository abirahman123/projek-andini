<?php

namespace App\Http\Controllers\Kecamatan;


use ResponseFormatter;
use Illuminate\Support\Str;
use App\Traits\HasReference;
use Illuminate\Http\Request;
use App\Models\Master\Periode;
use App\Models\Setting\Access;
use App\Models\Master\Kecamatan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\DataTables\Admin\KecamatanDataTable;
use App\Http\Requests\Menu\StoreMenuRequest;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\Master\Kecamatan\StoreKecamatan;
use App\Http\Requests\Master\Kecamatan\UpdateKecamatan;

class KecamatanController extends Controller
{



    public function index()
    {
        $dataTable = new KecamatanDataTable();
        return $dataTable->render('pages.admin.master.kecamatan.index');
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
    public function store(StoreKecamatan $request)
    {
        Kecamatan::create($request->all());
        return ResponseFormatter::created("Kecamatan Berhasil Ditambahkan");
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
    public function edit(string $id)
    {
        $kecamatan = Kecamatan::find($id);
        return response()->json($kecamatan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKecamatan $request, string $id)
    {
        $kecamatan = Kecamatan::find($id);
        $kecamatan->update($request->all());
        return ResponseFormatter::created("Kecamatan Berhasil Diubah");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kecamatan = Kecamatan::find($id);
        $kecamatan->delete();
        return ResponseFormatter::created('Kecamatan Berhasil Dihapus');
    }


}

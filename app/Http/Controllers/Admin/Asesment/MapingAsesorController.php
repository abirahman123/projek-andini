<?php

namespace App\Http\Controllers\Admin\Asesment;

use App\Http\Controllers\Controller;
use App\DataTables\admin\MapingDataTable;
use App\Models\Admin\MapingAssesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ResponseFormatter;

class MapingAsesorController extends Controller
{
    public function index(MapingDataTable $datatable) {
        return $datatable->render('pages.admin.asesment.index');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'asesmen_id' => 'required|numeric',
            'asesor_id' => 'required|numeric',
            'penilaian' => 'nullable|string',
            'catatan' => 'nullable|string',
            'status_rekomendasi' => 'required',
            'keterangan' => 'nullable|string',
        ]);
        MapingAssesor::create($validatedData);
        return ResponseFormatter::created("Data Berhasil Dibuat");
    }

    public function edit(string $id)
    {

        $data = MapingAssesor::find($id);
        return response()->json($data);
    }

    public function update(Request $request, string $id)
    {
        $data = MapingAssesor::find($id);
        $validatedData = $request->validate([
            'asesmen_id' => 'required|numeric',
            'asesor_id' => 'required|numeric',
            'penilaian' => 'nullable|string',
            'catatan' => 'nullable|string',
            'status_rekomendasi' => 'required',
            'keterangan' => 'nullable|string',
        ]);
        $data->update($validatedData);
        return ResponseFormatter::created("Data Berhasil Diedit");
    }

    public function destroy(string $id)
    {
        $data = MapingAssesor::find($id);
        $data->delete();
        return ResponseFormatter::created('Data Berhasil Dihapus');
    }

}

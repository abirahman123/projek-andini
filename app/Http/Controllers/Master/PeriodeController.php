<?php

namespace App\Http\Controllers\Master;

use App\DataTables\Master\PeriodeDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Master\Periode\StorePeriode;
use App\Http\Requests\Master\Periode\UpdatePeriode;
use App\Models\Master\Periode;
use Exception;
use Illuminate\Support\Facades\DB;
use ResponseFormatter;
// use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PeriodeDataTable $dataTable)
    {
        //
        return $dataTable->render('pages.admin.master.periode.index');
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
    public function store(StorePeriode $request)
    {
        // Set all other periods to not active
        try {
            DB::beginTransaction();
            Periode::where('is_active', '1')
                ->update(['is_active' => '0']);
            Periode::create($request->all());
            DB::commit();
            return ResponseFormatter::created("Periode Berhasil Ditambahkan");
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage());
        }
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

        $periode = Periode::find($id);
        return response()->json($periode);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePeriode $request, string $id)
    {
        $periode = Periode::find($id);
        $periode->update($request->all());
        return ResponseFormatter::created("Periode Berhasil Diubah");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $periode = Periode::find($id);
        $periode->delete();
        return ResponseFormatter::created('Periode Berhasil Dihapus');
    }
    public function activate(string $id)
    {
        $periode = Periode::find($id);
        try {
            Periode::where('is_active', '1')
                ->update(['is_active' => '0']);
            $periode->update(['is_active' => '1']);
            return ResponseFormatter::created('Periode Berhasil Diaktifkan');
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage());
        }
    }
}

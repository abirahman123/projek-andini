<?php

namespace App\Http\Controllers\Cms;

use App\DataTables\Cms\KategoriBeritaDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\CMS\KategoriBerita\StoreKategoriBerita;
use App\Http\Requests\CMS\KategoriBerita\UpdateKategoriBerita;
use App\Models\Cms\KategoriBerita;
use ResponseFormatter;

class KategoriBeritaController extends Controller
{
    protected $modules = ['cms',"cms.kategori-berita"];
    /**
     * Display a listing of the resource.
     */
    public function index(KategoriBeritaDataTable $dataTable)
    {
        return $dataTable->render('pages.admin.cms.kategori-berita.index');
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
    public function store(StoreKategoriBerita $request)
    {
        KategoriBerita::create($request->all());
        return ResponseFormatter::created("Kategori Berita Berhasil Ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoriBerita $kategoriBerita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $kategori_berita = KategoriBerita::find($id);
        return response()->json($kategori_berita);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKategoriBerita $request, string $id)
    {
        $kategoriBerita = KategoriBerita::find($id);
        $kategoriBerita->update($request->all());
        return ResponseFormatter::created("Kategori Berita Berhasil Diubah");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategoriBerita = KategoriBerita::find($id);
        $kategoriBerita->delete();
        return ResponseFormatter::created('Kategori Berita Berhasil Dihapus');
    }

    public function restore($id)
    {
        $kategoriBerita = KategoriBerita::withTrashed()->find($id);
        $kategoriBerita->restore();
        return ResponseFormatter::created('Kategori Berita Berhasil Di Restore');
    }
}

<?php

namespace App\Http\Controllers\Cms;

use App\DataTables\Cms\DokumenDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\CMS\Dokumen\StoreDokumenRequest;
use App\Models\Cms\Dokumen;
use ResponseFormatter;

class DokumenController extends Controller
{
    protected $modules = ['cms','cms.documents'];
    /**
     * Display a listing of the files.
     */
    public function index(DokumenDataTable $dataTable)
    {
        return $dataTable->render('pages.admin.cms.dokumen.index');
    }

    /**
     * Store a file in storage.
     *
     * Dynamic validation for allowed file types and max file size from SystemSettingModel.
     * max_file_size is in KB. Example: 1024
     * allowed_file_types is a comma separated string. Example: jpg,png,pdf
     *
     * @param StoreDokumenRequest $request
     */
    public function store(StoreDokumenRequest $request)
    {
        $document = Dokumen::updateOrCreate(
            ['id' => $request->id],
            $request->validated()
        );

        if($document){
            return ResponseFormatter::created("Dokumen berhasil dibuat", $document);
        }else{
            return ResponseFormatter::error("Gagal mengunggah dokumen", code:500);
        }

    }

    /**
     * Display the specified file.
     */
    public function edit($id)
    {
        $document = Dokumen::findOrfail($id);
        return response()->json([
            ...collect($document->toArray())->except('file'),
            'file' => getFileInfo($document->file)
        ]);
    }

    public function update(StoreDokumenRequest $request, $id)
    {
        $document = Dokumen::findOrFail($id);
        if ($document->update($request->validated())) {;
            return ResponseFormatter::success("Dokumen berhasil diperbarui", $document);
        } else {
            return ResponseFormatter::error("Dokumen tidak dapat diperbarui",code:500);
        }
    }

    /**
     * Remove the specified file from storage.
     */
    public function destroy($id)
    {
        $document = Dokumen::find($id);
        if ($document->delete()) {
            return ResponseFormatter::success("Dokumen berhasil dihapus");
        }
        return ResponseFormatter::error("Dokumen tidak dapat dihapus",code:500);
    }




    /**
     * Download the specified file.
     */
    public function download($id)
    {
        $document = Dokumen::find($id);
        return $document->download();
    }

    /**
     * Restore the specified file from storage.
     */
    public function restore($id)
    {
        $document = Dokumen::onlyTrashed()->find($id);
        if ($document->restore()) {
            return ResponseFormatter::success("Dokumen berhasil dipulihkan", $document);
        }
        return ResponseFormatter::error("Dokumen tidak dapat dipulihkan",code:500);
    }
}

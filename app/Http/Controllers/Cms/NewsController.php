<?php

namespace App\Http\Controllers\Cms;

use ResponseFormatter;
use App\Models\Cms\News;
use App\Models\Cms\KategoriBerita;
use App\Http\Controllers\Controller;
use App\DataTables\Cms\NewsDataTable;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CMS\News\StoreNewsRequest;
use App\Http\Requests\CMS\News\UpdateNewsRequest;

class NewsController extends Controller
{
    protected $modules = ["cms", "cms.news"];

    public function index(NewsDataTable $dataTable)
    {
        return $dataTable->render('pages.admin.cms.news.index', ['kategoris' => KategoriBerita::all()]);
    }

    public function store(StoreNewsRequest $request)
    {
    try {
        if ($request->hasFile('image_url')) {
            $uploadedFile = $request->file('image_url');
            $fileName = time() . '_' . $uploadedFile->getClientOriginalName();
            $filePath = $uploadedFile->storeAs('berita', $fileName, 'public');
            $request->merge(['image_url' => $filePath]);
        }

        $request->validated();
        $news = News::create(
            [
                'kategori_berita_id' => $request->kategori_berita_id,
                'image_url' => $filePath,
                'title' => $request->title,
                'description' => $request->description
            ]
        );

        return ResponseFormatter::created('Berita Berhasil Ditambahkan', $news);
    } catch (\Throwable $th) {
        return ResponseFormatter::error("Gagal Menambahkan Berita, server error", [
            'trace' => $th->getMessage()
        ], 500);
    }
}


    public function update(UpdateNewsRequest $request, string $id)
    {
        try {
            $news = News::findOrFail($id);
            $validatedData = $request->validated();
            $filePath = $news->image_url;
            if ($request->hasFile('image_url')) {
                // Hapus file lama
                Storage::disk('public')->delete($news->image_url);

                $uploadedFile = $request->file('image_url');
                $fileName = time() . '_' . $uploadedFile->getClientOriginalName();
                $filePath = $uploadedFile->storeAs('berita', $fileName, 'public');
                // Tambahkan path file ke data yang divalidasi
                $validatedData['image_url'] = $filePath;
            }
            $news->update([
                'kategori_berita_id' => $request->kategori_berita_id,
                'image_url' => $filePath,
                'title' => $validatedData['title'],
                'description' => $validatedData['description']
            ]);

            return ResponseFormatter::success('Berita berhasil diperbarui', $news);
        } catch (\Throwable $th) {
            return ResponseFormatter::error("Gagal memperbarui berita, server error", [
                'trace' => $th->getMessage()
            ], 500);
        }
    }

    public function destroy(News $news)
    {
        try {
            $imageUrl = $news->image_url;
            if (!empty($imageUrl)) {
                Storage::disk('public')->delete($imageUrl);
            }
            $news->delete();

            return ResponseFormatter::success('Berita Berhasil Dihapus');
        } catch (\Exception $e) {
            return ResponseFormatter::error('Gagal Menghapus Berita, server error', [
                'trace' => $e->getMessage()
            ], 500);
        }
    }

    public function edit(News $news)
    {
        // return Response()->json($news);
        return response()->json([
            ...collect($news->toArray())->except(['image_url']),
            'image_url' => getFileInfo($news->image_url),
        ]);
    }
}

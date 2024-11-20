<?php

namespace App\Http\Controllers\Cms;

use App\DataTables\Cms\Slideshow\SlideshowDataTable;
use App\Exceptions\RestrictDeleteException;
use App\Http\Controllers\Controller;
use App\Http\Requests\CMS\Slideshow\StoreSlideshowRequest;
use App\Models\Cms\SlideShow;
use Illuminate\Support\Facades\DB;
use ResponseFormatter;

class SlideShowController extends Controller
{
    protected $modules = ['cms','cms.slide-show'];
    public function index(SlideshowDataTable $dataTable)
    {
        return $dataTable->render('pages.admin.cms.slideshow.index');
    }

    public function store(StoreSlideshowRequest $request)
    {
        $data = $request->validated();

        try {
            $slideshow = SlideShow::updateOrCreate(
                ['id' => $request->id],
                $data
            );

            if ($slideshow->wasRecentlyCreated) {
                return ResponseFormatter::created("Slide Show berhasil ditambahkan", $slideshow);
            } else {
                return ResponseFormatter::created("Slide Show berhasil diubah", $slideshow);
            }
        } catch (\Exception $e) {
            return ResponseFormatter::error("Gagal menambahkan Slide Show, server error", code: 500);
        }
    }

    public function edit($id)
    {
        $slideshow = SlideShow::find($id);
        return response()->json($slideshow);
    }

    public function update(StoreSlideshowRequest $request, SlideShow $slideshow)
    {
        try {
            $validatedData = $request->validated();

            DB::beginTransaction();
            try {
                if ($validatedData['is_active'] == '1') {
                    if ($slideshow->items()->count() == 0) {
                        return ResponseFormatter::error("Slide Show tidak bisa diaktifkan karena tidak memiliki item", code: 400);
                    }

                    SlideShow::where('id', '!=', $slideshow->id)->update(['is_active' => '0']);
                }

                $slideshow->update($validatedData);

                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                return ResponseFormatter::error("Gagal mengubah Slide Show", code: 500);
            }
            return ResponseFormatter::success("Slide Show berhasil diubah", $slideshow);
        } catch (\Exception $e) {
            return ResponseFormatter::error("Gagal mengubah Slide Show, server error", code: 500);
        }
    }

    public function destroy($id)
    {
        $slideshow = SlideShow::find($id);

        try {
            if ($slideshow->deleteOrFail()) {
                return ResponseFormatter::success("Slide Show berhasil dihapus");
            }
        } catch (RestrictDeleteException $e) {
            return ResponseFormatter::error($e->getMessage());
        }
        return ResponseFormatter::error("Gagal menghapus Slide Show, server error", code: 500);
    }

    public function restore($id)
    {
        $slideshow = SlideShow::withTrashed()->find($id);
        if ($slideshow->restore()) {
            return ResponseFormatter::success("Slide Show berhasil direstore");
        }
        return ResponseFormatter::error("Gagal merestore Slide Show, server error", code: 500);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Catin;
use App\Models\Cms\FAQs;
use Illuminate\Http\Request;
use App\Models\Cms\SlideShow;
use App\Models\Cms\SlideShowItem;
use App\Models\Master\Kecamatan;
use Illuminate\Support\Facades\DB;
use ResponseFormatter;

class LandingController extends Controller
{
    public function index()
    {
        $slideshowitems = SlideShow::where('name', 'landing')->first()?->slideshowitems()->orderBy('order')->get() ?? [];
        $faqs = FAQs::where('is_active','1')->latest('created_at')->get();
        return view('pages.landing.index', compact('slideshowitems', 'faqs'));
    }

    public function chart(Request $request)
    {
        $name = $request->get('name');
        $group = $request->get('group');
        $series = [];
        $categories = [];

        if ($name == "catin") {
            if ($group == 'kecamatan') {
                $aliases = [
                    'L' => 'Laki-laki',
                    'P' => 'Perempuan'
                ];

                $result = [];

                foreach ($aliases as $k => $v) {
                    $catinOnKecamatan = Kecamatan::leftJoin('catin', function ($join) use ($k) {
                        $join->on('ref_kecamatan.id', '=', 'catin.kecamatan_id')
                            ->where('jenis_kelamin', $k);
                    })
                        ->select(DB::raw('count(catin.id) as jumlah_catin, ref_kecamatan.nama_kecamatan'))
                        ->groupBy('ref_kecamatan.nama_kecamatan')
                        ->get();

                    foreach ($catinOnKecamatan as $catin) {
                        $result[$catin->nama_kecamatan][$v] = $catin->jumlah_catin;
                        $series[$v][] = $catin->jumlah_catin;
                    }
                }
                $categories = array_keys($result);
            } else if ($group == 'jenis_kelamin') {
                $aliases = [
                    'L' => 'Laki-laki',
                    'P' => 'Perempuan'
                ];
                foreach ($aliases as $k => $v) {
                    $jumlah_catin = Catin::where('jenis_kelamin', $k)->count();
                    $series[] = $jumlah_catin;
                    $categories[] = $aliases[$k];
                }
            }
        }
        return ResponseFormatter::success('success', [
            'series' => $series,
            'categories' => $categories
        ]);
    }
}

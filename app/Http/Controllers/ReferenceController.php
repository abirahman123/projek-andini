<?php

namespace App\Http\Controllers;

use App\Models\Admin\Asesor as AdminAsesor;
use App\Models\Akademik\ProgramStudi;
use App\Models\Akademik\TahunAjaran;
use App\Models\Cms\KategoriBerita;
use App\Models\Master\KabupatenKota;
use App\Models\Master\Kecamatan;
use App\Models\Master\Kelurahan;
use App\Models\Master\Pegawai;
use App\Models\Master\Periode;
use App\Models\Master\Provinsi;
use App\Models\Register;
use App\Models\Rpl\Asesor;
use App\Models\Rpl\Matakuliah;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use ResponseFormatter;

class ReferenceController extends Controller
{
    private function formatResults(Collection|array $data, string $key = 'id', string $value = "name", int $limit = 10,  callable $callbackLabel = null)
    {
        if ($data instanceof Collection) {
            $data = $data->toArray();
        }
        $result = [];
        foreach ($data as $item) {
            $result[] = [
                "id" => $item[$key],
                "text" => $callbackLabel ? $callbackLabel($item) : $item[$value]
            ];
        }

        return collect($result)->slice(0, $limit)->values();
    }


    public function user(Request $request)
    {
        $search = $request->get('q');
        $limit = 10;
        $key = 'name';
        $results = User::where($key, 'like', "%{$search}%")
            ->limit($limit)
            ->get();

        $results = $this->formatResults($results, 'id', $key, $limit);
        return ResponseFormatter::success('success', $results);
    }

    public function kecamatan(Request $request)
    {
        $search = $request->get('q');
        $limit = 10;
        $key = 'nama_kecamatan';
        $results = Kecamatan::where($key, 'like', "%{$search}%")
            ->limit($limit)
            ->get();
        $results = $this->formatResults($results, 'id', $key, $limit);
        return ResponseFormatter::success('success', $results);
    }


    public function kategori_berita(Request $request)
    {
        $search = $request->get('q');
        $limit = 10;
        $key = 'name';
        $results = KategoriBerita::where($key, 'like', "%{$search}%")
            ->limit($limit)
            ->get();

        $results = $this->formatResults($results, 'id', $key, $limit);
        return ResponseFormatter::success('success', $results);
    }
    public function periode(Request $request)
    {
        $search = $request->get('q');
        $limit = 10;
        $key = 'periode';
        $results = Periode::where($key, 'like', "%{$search}%")
            ->limit($limit)
            ->get();

        $results = $this->formatResults($results, 'id', $key, $limit);
        return ResponseFormatter::success('success', $results);
    }

    public function register(Request $request)
    {
        $search = $request->get('q');
        $limit = 10;
        $key = 'nama';
        $results = Register::where($key, 'like', "%{$search}%")
            ->limit($limit)
            ->get();

        $results = $this->formatResults($results, 'id', $key, $limit);
        return ResponseFormatter::success('success', $results);
    }

    public function icon(Request $request)
    {
        $iconFile =  file_get_contents(public_path('assets/libs/fontawesome/css/all.css'));
        preg_match_all("/\.fa-.*:before/", $iconFile, $matches);
        $result = [];

        foreach ($matches[0] as $match) {
            $name = str_replace([":before", "."], "", $match);
            $result[] = [
                "id" => "fal $name",
                "name" => "fal $name"
            ];
        }

        if ($request->term) {
            $result = collect($result)->filter(function ($value, $key) use ($request) {
                return stripos($value['name'], $request->term);
            })->values()->toArray();
        }

        // $result = $this->generateReference($result);
        $result = $this->formatResults($result);
        return ResponseFormatter::success("success get icons", $result);
    }

    public function kelurahan(Request $request)
    {
        $search = $request->get('q');
        $limit = 10;
        $key = 'nama_kelurahan';

        $queryParams = $request->only(['kecamatan_id']);

        $results = Kelurahan::where($key, 'like', "%{$search}%")
            ->when(isset($queryParams['kecamatan_id']), function ($query) use ($queryParams) {
                return $query->where('kecamatan_id', $queryParams['kecamatan_id']);
            })
            ->limit($limit)
            ->get();
        $results = $this->formatResults($results, 'id', $key, $limit);
        return ResponseFormatter::success('success', $results);
    }

    public function pegawai(Request $request)

    {
        $search = $request->get('q');
        $limit = 10;
        $key = 'nama';

        $queryParams = $request->only(['kepala_upt', 'pembina_utama_muda', 'pembina', 'sekretaris', 'bendahara', 'pengawas']);

        $results = Pegawai::where($key, 'like', "%{$search}%")
            ->whereNotIn('id', collect($queryParams)->values()->toArray())
            ->limit($limit)
            ->get();

        $results = $this->formatResults($results, 'id', $key, $limit);
        return ResponseFormatter::success('success', $results);
    }


    public function assesor(Request $request)
    {
        $search = $request->get('q');
        $limit = 10;
        $key = 'nama';

        $results = AdminAsesor::where($key, 'like', "%{$search}%")
            ->limit($limit)
            ->get();
        $results = $this->formatResults($results, 'id', $key, $limit);
        return ResponseFormatter::success('success', $results);
    }
}

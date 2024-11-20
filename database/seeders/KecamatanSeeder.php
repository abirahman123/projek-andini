<?php

namespace Database\Seeders;

use App\Models\Master\Kecamatan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class KecamatanSeeder extends Seeder
{
    public function run()
    {
        DB::beginTransaction();
        try {
            $wilayah = file_get_contents(public_path('json/wilayah-administrasi.json'));
            $wilayah = json_decode($wilayah);

            $kecamatan = $this->groupKecamatan($wilayah);
            $kecamatan = array_values($kecamatan);

            foreach ($kecamatan as $value) {
                $kec = $this->findOrCreateKecamatan($value);

                if ($value['kelurahan'] != null && count($value['kelurahan']) > 0) {
                    foreach ($value['kelurahan'] as $val) {
                        $this->updateOrCreateKelurahan($kec, $val);
                    }
                }
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }

    private function groupKecamatan($wilayah)
    {
        $kecamatan = [];
        foreach ($wilayah as $item) {
            $kecamatan[$item->kode_kecamatan]['kode_kecamatan'] = $item->kode_kecamatan;
            $kecamatan[$item->kode_kecamatan]['kecamatan'] = $item->kecamatan;
            $kecamatan[$item->kode_kecamatan]['kelurahan'][] = [
                'kode_desa' => $item->kode_desa,
                'kode_kecamatan' => $item->kode_kecamatan,
                'desa' => $item->desa
            ];
        }
        return $kecamatan;
    }

    private function findOrCreateKecamatan($value)
    {
        $kec = Kecamatan::where('kode_kecamatan', $value['kode_kecamatan'])->first();
        if ($kec != null) {
            $kec->update([
                'kode_kecamatan' => $value['kode_kecamatan'],
                'nama_kecamatan' => $value['kecamatan']
            ]);
        } else {
            $kec = new Kecamatan();
            $kec->kode_kecamatan = $value['kode_kecamatan'];
            $kec->nama_kecamatan = $value['kecamatan'];
            $kec->save();
        }
        return $kec;
    }

    private function updateOrCreateKelurahan($kec, $val)
    {
        $kel = \App\Models\Master\Kelurahan::where('kode_kelurahan', $val['kode_desa'])->first();
        if ($kel != null) {
            $kel->update([
                'kecamatan_id' => $kec->id,
                'kode_kelurahan' => $val['kode_desa'],
                'nama_kelurahan' => $val['desa']
            ]);
        } else {
            $kelurahan = new \App\Models\Master\Kelurahan();
            $kelurahan->kecamatan_id = $kec->id;
            $kelurahan->kode_kelurahan = $val['kode_desa'];
            $kelurahan->nama_kelurahan = $val['desa'];
            $kelurahan->save();
        }
    }
}

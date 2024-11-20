<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanFungsionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'kode_jabatan'  => '1',
                'nama_jabatan'  => 'Kepala UPPT',
                'golongan'      => 'III/a',
                'jabatan_fungsional' => 'Kepala UPPT',
            ],
            [
                'kode_jabatan'  => '2',
                'nama_jabatan'  => 'Sekretaris Umum',
                'golongan'      => 'III/a',
                'jabatan_fungsional' => 'Sekretaris Umum',
            ],
            [
                'kode_jabatan'  => '3',
                'nama_jabatan'  => 'Bendahara Umum',
                'golongan'      => 'III/a',
                'jabatan_fungsional' => 'Bendahara Umum',
            ],


        ])->each(function ($jabatanFungsional) {
            \App\Models\Master\JabatanFungsional::create($jabatanFungsional);
        });
    }
}

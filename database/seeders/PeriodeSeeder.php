<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect(
            [
                [
                    'periode' => 'Periode 2024',
                    'tahun' => '2024',
                    'keterangan' => 'Periode 2024',
                    'is_active' => '1',
                ],
                [
                    'periode' => 'Periode 2023',
                    'tahun' => '2023',
                    'keterangan' => 'Periode 2023',
                    'is_active' => '0',
                ],
                [
                    'periode' => 'Periode 2022',
                    'tahun' => '2022',
                    'keterangan' => 'Periode 2022',
                    'is_active' => '0',
                ],
                [
                    'periode' => 'Periode 2021',
                    'tahun' => '2021',
                    'keterangan' => 'Periode 2021',
                    'is_active' => '0',
                ],
            ]
        )->each(function ($periode) {
            \App\Models\Master\Periode::create($periode);
        });
    }
}

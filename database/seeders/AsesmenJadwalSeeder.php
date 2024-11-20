<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AsesmenJadwal;

class AsesmenJadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menyimpan data ke dalam array
        $data = [
            [
                'register_id' => 1,
                'periode_id' => 1,
                'tanggal_asesmen' => '2024-04-28',
                'catatan' => 'Contoh catatan10',
                'status' => 'SUBMITTED', // Memastikan nilai status adalah salah satu dari 'SUBMITTED', 'REVISED', 'APPROVED', atau 'REJECTED'
                'keterangan' => 'Contoh keterangan10',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        // Masukkan data ke dalam database
        foreach ($data as $item) {
            AsesmenJadwal::create($item);
        }
    }
}


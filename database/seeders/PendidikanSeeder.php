<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenjang = file_get_contents(public_path('json/pendidikan.json'));
        $jenjang = json_decode($jenjang, true);

        foreach ($jenjang as $data) {
            \App\Models\Master\Pendidikan::create($data);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agama = file_get_contents(public_path('json/agama.json'));
        $agama = json_decode($agama, true);

        foreach ($agama as $data) {
            \App\Models\Master\Agama::create($data);
        }
    }
}

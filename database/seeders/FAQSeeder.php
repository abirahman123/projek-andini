<?php

namespace Database\Seeders;

use App\Models\Cms\FAQs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $qs = [
            [
                'question' => 'Apa itu Andini',
                'answer' => 'Andini adalah sebuah platform yang digunakan untuk mengajukan permohonan dispensasi untuk menikah dini',
                'created_by' => 1
            ],
            [
                'question' => 'Bagaimana cara mendaftar di Andini App',
                'answer' => 'Untuk mendaftar di Andini App, pengguna harus mengunduh aplikasi Andini di Playstore atau Appstore kemudian melakukan registrasi dengan mengisi data diri yang diminta',
                'created_by' => 1
            ],
            [
                'question' => 'Apa saja syarat untuk menggunakan Andini App',
                'answer' => 'Syarat untuk menggunakan Andini App adalah pengguna harus berusia minimal 18 tahun',
                'created_by' => 1
            ],
            [
                'question' => 'Bagaimana cara mengajukan dispensasi di Andini App',
                'answer' => 'Untuk mengajukan dispensasi di Andini App, pengguna harus mengisi data diri yang diminta kemudian mengunggah dokumen yang diperlukan',
                'created_by' => 1
            ],
            [
                'question' => 'Berapa lama proses dispensasi di Andini App',
                'answer' => 'Proses dispensasi di Andini App memakan waktu 3 hari kerja',
                'created_by' => 1
            ],
            [
                'question' => 'Bagaimana cara mengetahui status dispensasi di Andini App',
                'answer' => 'Pengguna dapat mengetahui status dispensasi di Andini App dengan cara login ke aplikasi kemudian masuk ke menu status',
                'created_by' => 1
            ]
        ];

        FAQs::insert($qs);
    }
}

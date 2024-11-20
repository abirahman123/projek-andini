<?php

namespace Database\Seeders;

use App\Models\Setting\SiteSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $initial = [
            [
                "type" => "site-identity",
                "name" => "site_name",
                "value" => "Andini App",
                "description" => "Application Name"
            ],
            [
                "type" => "site-identity",
                "name" => "site_description",
                "value" => "Platform untuk anda yang ingin nikah dini, tanpa takut polisi",
                "description" => "Application Description"
            ],
        ];

        SiteSetting::insert($initial);
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('asesmen_penilaian', function (Blueprint $table) {
            $table->string('lama_hubungan')->nullable()->after('asesor_id')->comment('Lama Hubungan Terjalin');
            $table->string('alasan_menikah')->nullable()->after('lama_hubungan')->comment('Alasan/Tujuan Menikah');
            $table->string('gaya_berpacaran')->nullable()->after('alasan_menikah')->comment('Gaya Berpacaran Catin/Hamil Luar Nikah');
            $table->string('pekerjaan_catin')->nullable()->after('gaya_berpacaran')->comment('Pekerjaan Catin');
            $table->string('penghasilan_catin')->nullable()->after('pekerjaan_catin')->comment('Penghasilan Catin');
            $table->string('persetujuan_keluarga')->nullable()->after('penghasilan_catin')->comment('Persetujuan Keluarga');
            $table->string('pola_hubungan')->nullable()->after('persetujuan_keluarga')->comment('Pola Hubungan Orang tua dan anak');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('asesmen_penilaian', function (Blueprint $table) {
            $table->dropColumn('lama_hubungan');
            $table->dropColumn('alasan_menikah');
            $table->dropColumn('gaya_berpacaran');
            $table->dropColumn('pekerjaan_catin');
            $table->dropColumn('penghasil_catin');
            $table->dropColumn('persetujuan_keluarga');
            $table->dropColumn('pola_hubungan');
            $table->dropColumn('tambahan');
        });
    }
};

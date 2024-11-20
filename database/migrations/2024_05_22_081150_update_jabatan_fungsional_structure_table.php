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
        Schema::table('jabatan_fungsional', function (Blueprint $table) {
            $table->unsignedBigInteger('kepala_upt')->after('periode_id')->nullable()->change();
            $table->unsignedBigInteger('pembina_utama_muda')->after('kepala_upt')->nullable()->change();
            $table->unsignedBigInteger('pembina')->after('pembina_utama_muda')->nullable()->change();
            $table->unsignedBigInteger('sekretaris')->after('pembina')->nullable()->change();
            $table->unsignedBigInteger('bendahara')->after('sekretaris')->nullable()->change();
            $table->unsignedBigInteger('pengawas')->after('bendahara')->nullable()->change();
            $table->unsignedBigInteger('pengadministrasi_umum')->after('pengawas')->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jabatan_fungsional', function (Blueprint $table) {
            $table->dropColumn('kepala_upt');
            $table->dropColumn('pembina_utama_muda');
            $table->dropColumn('pembina');
            $table->dropColumn('sekretaris');
            $table->dropColumn('bendahara');
            $table->dropColumn('pengawas');
            $table->dropColumn('pengadministrasi_umum');
        });
    }
};

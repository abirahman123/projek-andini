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
            $table->uuid('id')->change();

            $table->unsignedBigInteger('periode_id')->after('id');
            $table->unsignedBigInteger('kepala_upt')->after('periode_id');
            $table->unsignedBigInteger('pembina_utama_muda')->after('kepala_upt');
            $table->unsignedBigInteger('pembina')->after('pembina_utama_muda');
            $table->unsignedBigInteger('sekretaris')->after('pembina');
            $table->unsignedBigInteger('bendahara')->after('sekretaris');
            $table->unsignedBigInteger('pengawas')->after('bendahara');
            $table->unsignedBigInteger('pengadministrasi_umum')->after('pengawas');

            $table->foreign('periode_id')->references('id')->on('periode');
            $table->foreign('kepala_upt')->references('id')->on('pegawai');
            $table->foreign('pembina_utama_muda')->references('id')->on('pegawai');
            $table->foreign('pembina')->references('id')->on('pegawai');
            $table->foreign('sekretaris')->references('id')->on('pegawai');
            $table->foreign('bendahara')->references('id')->on('pegawai');
            $table->foreign('pengawas')->references('id')->on('pegawai');
            $table->foreign('pengadministrasi_umum')->references('id')->on('pegawai');

            // Remove old columns if they exist
            if (Schema::hasColumn('jabatan_fungsional', 'kode_jabatan')) {
                $table->dropColumn('kode_jabatan');
            }
            if (Schema::hasColumn('jabatan_fungsional', 'nama_jabatan')) {
                $table->dropColumn('nama_jabatan');
            }
            if (Schema::hasColumn('jabatan_fungsional', 'golongan')) {
                $table->dropColumn('golongan');
            }
            if (Schema::hasColumn('jabatan_fungsional', 'jabatan_fungsional')) {
                $table->dropColumn('jabatan_fungsional');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jabatan_fungsional', function (Blueprint $table) {
            // Drop foreign keys
            $table->dropForeign(['periode_id']);
            $table->dropForeign(['kepala_upt']);
            $table->dropForeign(['pembina_utama_muda']);
            $table->dropForeign(['pembina']);
            $table->dropForeign(['sekretaris']);
            $table->dropForeign(['bendahara']);
            $table->dropForeign(['pengawas']);
            $table->dropForeign(['pengadministrasi_umum']);

            // Drop new columns if they exist
            if (Schema::hasColumn('jabatan_fungsional', 'periode_id')) {
                $table->dropColumn('periode_id');
            }
            if (Schema::hasColumn('jabatan_fungsional', 'kepala_upt')) {
                $table->dropColumn('kepala_upt');
            }
            if (Schema::hasColumn('jabatan_fungsional', 'pembina_utama_muda')) {
                $table->dropColumn('pembina_utama_muda');
            }
            if (Schema::hasColumn('jabatan_fungsional', 'pembina')) {
                $table->dropColumn('pembina');
            }
            if (Schema::hasColumn('jabatan_fungsional', 'sekretaris')) {
                $table->dropColumn('sekretaris');
            }
            if (Schema::hasColumn('jabatan_fungsional', 'bendahara')) {
                $table->dropColumn('bendahara');
            }
            if (Schema::hasColumn('jabatan_fungsional', 'pengawas')) {
                $table->dropColumn('pengawas');
            }
            if (Schema::hasColumn('jabatan_fungsional', 'pengadministrasi_umum')) {
                $table->dropColumn('pengadministrasi_umum');
            }
        });
    }
};

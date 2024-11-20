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
        Schema::create('catin', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('nik',16)->unique();
            $table->string('nama_lengkap',200);
            $table->string('tempat_lahir',200);
            $table->date('tanggal_lahir');
            $table->string('nomor_hp',20);
            $table->string('pekerjaan',200)->nullable();
            $table->foreignId('kecamatan_id')->constrained('ref_kecamatan')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('kelurahan_id')->constrained('ref_kelurahan')->onDelete('restrict')->onUpdate('cascade');
            $table->text('alamat')->nullable();
            $table->string('nama_ayah',200);
            $table->string('nama_ibu',200);
            $table->string('nama_wali',200)->nullable();
            $table->enum('status_verifikasi', ['SUBMITTED', 'APPROVED', 'REJECTED'])->nullable()->comment('SUBMITTED = Diajukan, APPROVED = Disetujui, REJECTED = Ditolak');
            $table->text('pas_foto')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catin');
    }
};

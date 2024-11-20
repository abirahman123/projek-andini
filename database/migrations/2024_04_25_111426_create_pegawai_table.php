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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 20)->unique();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->string('nomor_hp', 15)->nullable();
            $table->string('email')->nullable();
            $table->foreignId('kecamatan_id')->constrained('ref_kecamatan')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('kelurahan_id')->constrained('ref_kelurahan')->onUpdate('cascade')->onDelete('restrict');
            $table->string('alamat');
            $table->enum('status', ['0', '1'])->default('1');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};

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
        Schema::create('ref_persyaratan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('periode_id')->constrained('periode')->onUpdate('cascade')->onDelete('restrict');
            $table->string('nama_persyaratan');
            $table->text('keterangan')->nullable();
            $table->text('file_pendukung')->nullable();
            $table->enum('is_wajib', ['1', '0'])->default('1')->comment('1 = Wajib, 0 = Tidak Wajib');
            $table->enum('is_active', ['1', '0'])->default('1')->comment('1 = Aktif, 0 = Tidak Aktif');
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
        Schema::dropIfExists('ref_persyaratan');
    }
};

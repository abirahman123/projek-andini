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
        Schema::create('asesmen_penilaian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asesmen_id')->constrained('asesmen_jadwal')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('asesor_id')->constrained('asesor')->onUpdate('cascade')->onDelete('restrict');
            $table->text('penilaian')->nullable();
            $table->text('catatan')->nullable();
            $table->enum('status_rekomendasi', ['DIREKOMENDASIKAN', 'TIDAK_DIREKOMENDASIKAN'])->nullable()->comment('DIREKOMENDASIKAN: Direkomendasikan, TIDAK_DIREKOMENDASIKAN: Tidak direkomendasikan');
            $table->text('keterangan')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
            $table->unique(['asesmen_id', 'asesor_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asesmen_penilaian');
    }
};

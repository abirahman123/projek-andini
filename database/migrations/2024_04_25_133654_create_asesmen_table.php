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
        Schema::create('asesmen_jadwal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('register_id')
                ->constrained('register')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->foreignId('periode_id')->constrained('periode')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamp('tanggal_asesmen')->nullable();
            $table->text('catatan')->nullable();
            $table->enum('status', ['SUBMITTED', 'REVISED', 'APPROVED', 'REJECTED'])->default('SUBMITTED')->comment('SUBMITTED: Menunggu persetujuan, REVISED: Perlu revisi, APPROVED: Disetujui, REJECTED: Ditolak');
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('asesmen_jadwal');
    }
};

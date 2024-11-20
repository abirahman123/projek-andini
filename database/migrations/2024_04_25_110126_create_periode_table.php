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
        Schema::create('periode', function (Blueprint $table) {
            $table->id();
            $table->string('periode')->comment('Periode. Misal: 2024/2025');
            $table->string('tahun', 4)->unique()->comment('Tahun. Misal: 2024');
            $table->text('keterangan')->nullable()->comment('Keterangan');
            $table->enum('is_active', ['1', '0'])->default('0')->comment('1 = Aktif, 0 = Tidak Aktif');
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
        Schema::dropIfExists('periode');
    }
};

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
        Schema::create('jabatan_fungsional', function (Blueprint $table) {
            $table->id();
            $table->string('kode_jabatan')->unique();
            $table->string('nama_jabatan');
            $table->string('golongan')->nullable()->comment('Golongan. Misal: III/a');
            $table->string('jabatan_fungsional')->nullable()->comment('Jabatan Fungsional. Misal: Penata Muda');
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
        Schema::dropIfExists('jabatan_fungsional');
    }
};

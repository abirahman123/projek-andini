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
        Schema::create('catin_persyaratan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('persyaratan_id')->constrained('ref_persyaratan');
            $table->text('file_path');
            $table->enum('status', ['SUBMITTED', 'REVISED', 'APPROVED', 'REJECTED'])->default('SUBMITTED');
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
        Schema::dropIfExists('catin_persyaratan');
    }
};

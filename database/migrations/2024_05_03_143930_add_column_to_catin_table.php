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
        Schema::table('catin', function (Blueprint $table) {
            $table->foreignUuid('dispensasi_id')->nullable()->constrained('dispensasi')->onDelete('restrict')->onUpdate('cascade');
            $table->unique(['dispensasi_id', 'jenis_kelamin'], 'catin_dispensasi_id_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('catin', function (Blueprint $table) {
            $table->dropForeign(['dispensasi_id']);
            $table->dropColumn('dispensasi_id');
        });
    }
};

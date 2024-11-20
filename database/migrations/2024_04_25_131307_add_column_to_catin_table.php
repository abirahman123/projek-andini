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
            $table->foreignId('agama_id')
            ->after('alamat')
            ->constrained('ref_agama')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('pendidikan_id')
            ->after('agama_id')
            ->constrained('ref_pendidikan')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('catin', function (Blueprint $table) {
            $table->dropForeign(['agama_id']);
            $table->dropColumn('agama_id');
            $table->dropForeign(['pendidikan_id']);
            $table->dropColumn('pendidikan_id');
        });
    }
};

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
        Schema::table('asesmen_jadwal', function (Blueprint $table) {
            $table->foreignUuid('dispensasi_id')->nullable()
            ->after('id')
            ->constrained('dispensasi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('asesmen_jadwal', function (Blueprint $table) {
            $table->dropForeign(['dispensasi_id']);
            $table->dropColumn('dispensasi_id');
        });
    }
};

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
        Schema::table('catin_persyaratan', function (Blueprint $table) {
            $table->unique(['persyaratan_id', 'catin_id'], 'catin_persyaratan_persyaratan_id_catin_id_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('catin_persyaratan', function (Blueprint $table) {
            $table->dropUnique('catin_persyaratan_persyaratan_id_catin_id_unique');
        });
    }
};

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
            $table->foreignUuid('catin_id')->nullable()->constrained('catin')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('catin_persyaratan', function (Blueprint $table) {
            $table->dropForeign(['catin_id']);
            $table->dropColumn('catin_id');
        });
    }
};

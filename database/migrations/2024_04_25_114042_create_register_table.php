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
        Schema::create('register', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('restrict')->onUpdate('cascade');
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('nomor_hp')->unique();
            $table->foreignId('kecamatan_id')->nullable()->constrained('ref_kecamatan')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('kelurahan_id')->nullable()->constrained('ref_kelurahan')->onDelete('restrict')->onUpdate('cascade');
            $table->string('alamat');
            $table->enum('is_active', ['1', '0'])->default('1')->comment('1 = Aktif, 0 = Tidak Aktif');
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
        Schema::dropIfExists('register');
    }
};

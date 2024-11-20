<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_berita_id')->constrained('kategori_news')->onUpdate('cascade')->onDelete('restrict');
            $table->text('image_url')->nullable();
            $table->string('title');
            $table->string('description');
            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};

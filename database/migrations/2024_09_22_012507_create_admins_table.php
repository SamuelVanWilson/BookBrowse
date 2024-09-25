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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->unique();
            $table->string('cover')->nullable();
            $table->foreignId('pencipta_id')->constrained('penciptas');
            $table->string('nama_penerbit');
            $table->integer('tahun_terbit');
            $table->foreignId('kategori_id')->constrained('categeories');
            $table->text('sinopsis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};

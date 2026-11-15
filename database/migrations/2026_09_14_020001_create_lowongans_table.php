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
        Schema::create('lowongans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perusahaan_id')->constrained('perusahaans')->cascadeOnDelete();
            $table->string('judul');
            $table->string('tipe_kerja')->default('WFO'); // WFO, WFH, Hybrid
            $table->string('lokasi')->default('Jakarta');
            $table->string('jurusan'); // contoh: 'RPL / Multimedia', 'DKV / Animasi', dll
            $table->string('keahlian')->nullable(); // contoh: 'Tailwind & JS', 'Premiere & Figma'
            $table->integer('kuota')->default(1);
            $table->integer('sisa_kuota')->default(1);
            $table->text('deskripsi')->nullable();
            $table->text('persyaratan')->nullable();
            $table->enum('status', ['buka', 'tutup'])->default('buka');
            $table->date('deadline')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lowongans');
    }
};


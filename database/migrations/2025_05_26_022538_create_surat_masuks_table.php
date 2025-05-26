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
    Schema::create('surat_masuks', function (Blueprint $table) {
        $table->id();
        $table->string('nomor_surat');
        $table->date('tanggal_surat');
        $table->string('pengirim');
        $table->string('perihal');
        $table->string('kategori');
        $table->string('status_surat');
        $table->string('sifat_surat');
        $table->string('tujuan_surat');
        $table->string('petunjuk');
        $table->string('catatan')->nullable();
        $table->text('isi_disposisi')->nullable();
        $table->text('disposisi_kasubbag')->nullable();
        $table->string('file')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_masuks');
    }
};

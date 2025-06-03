<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKeluarsTable extends Migration
{
    public function up()
    {
        Schema::create('surat_keluars', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat');
            $table->date('tanggal_surat');
            $table->string('sifat_surat');
            $table->string('lampiran');
            $table->string('hal');
            $table->string('tujuan_surat');
            $table->string('file_path'); // path file upload
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('surat_keluars');
    }

    
}

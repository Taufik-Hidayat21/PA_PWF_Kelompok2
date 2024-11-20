<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('fasilitas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi');
            $table->string('kategori');
            $table->string('gambar');
            $table->enum('status', ['tersedia', 'tidak tersedia', 'dalam perbaikan']);
            $table->integer('kapasitas')->nullable();
            $table->string('lokasi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fasilitas');
    }
};

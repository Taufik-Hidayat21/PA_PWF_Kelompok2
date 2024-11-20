<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->text('tentang');
            $table->text('sejarah');
            $table->string('sejarah_image')->nullable();
            $table->text('visi');
            $table->text('misi');
            $table->text('struktur_organisasi');
            $table->string('struktur_organisasi_image')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('abouts');
    }
};
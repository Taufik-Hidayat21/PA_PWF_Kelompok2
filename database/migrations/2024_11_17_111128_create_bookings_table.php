<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penghuni_id');
            $table->unsignedBigInteger('kamar_id');
            $table->date('check_in');
            $table->date('check_out');
            $table->string('status');
            $table->timestamps();

            $table->foreign('penghuni_id')->references('id')->on('penghunis')->onDelete('cascade');
            $table->foreign('kamar_id')->references('id')->on('kamars')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
}

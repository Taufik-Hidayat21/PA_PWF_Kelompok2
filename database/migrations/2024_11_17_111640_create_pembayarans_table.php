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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('penghuni_id');
            $table->unsignedBigInteger('kamar_id');
            $table->decimal('amount', 10, 2);
            $table->date('payment_date');
            $table->string('status');

            $table->foreign('penghuni_id')->references('id')->on('penghunis');
            $table->foreign('kamar_id')->references('id')->on('kamars');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
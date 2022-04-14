<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('broker_id')->constrained('brokers', 'id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('perusahaan_id')->constrained('perusahaans', 'id')->onUpdate('cascade')->onDelete('cascade');
            $table->decimal('harga', 19, 2)->default(0);
            $table->bigInteger('lot', false)->default(0);
            $table->bigInteger('total_lembar', false)->default(0);
            $table->decimal('subtotal_nilai', 19, 2)->default(0);
            $table->decimal('fee_buy_nilai', 19, 2)->default(0);
            $table->decimal('total_nilai_beli', 19, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
};

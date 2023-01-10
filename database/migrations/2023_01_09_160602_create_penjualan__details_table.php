<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualanDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan__details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('id_barang');
            $table->unsignedBigInteger('id_penjualan');
            $table->string('nama_produk');
            $table->integer('harga_jual');
            $table->integer('qty');
            $table->integer('sub_total');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('id_barang')
                ->references('id')
                ->on('barangs')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('id_penjualan')
                ->references('id')
                ->on('penjualans')
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualan__details');
    }
}

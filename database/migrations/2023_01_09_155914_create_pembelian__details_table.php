<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembelianDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelian__details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('id_barang');
            $table->unsignedBigInteger('id_pembelian');
            $table->string('nama_produk');
            $table->integer('harga_beli');
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

            $table->foreign('id_pembelian')
                ->references('id')
                ->on('pembelians')
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
        Schema::dropIfExists('pembelian__details');
    }
}

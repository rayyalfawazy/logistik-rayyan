<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangMasukTable extends Migration
{
    public function up()
    {
        Schema::create('barang_masuk', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang');
            $table->string('nama_barang')->nullable();
            $table->integer('quantity');
            $table->string('origin')->nullable();
            $table->date('tanggal_masuk');
        });
    }

    public function down()
    {
        Schema::dropIfExists('barang_masuk');
    }
}

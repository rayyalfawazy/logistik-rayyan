<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangKeluarTable extends Migration
{
    public function up()
    {
        Schema::create('barang_keluar', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang');
            $table->string('nama_barang')->nullable();
            $table->integer('quantity');
            $table->string('destination')->nullable();
            $table->date('tanggal_keluar');
        });
    }

    public function down()
    {
        Schema::dropIfExists('barang_keluar');
    }
}

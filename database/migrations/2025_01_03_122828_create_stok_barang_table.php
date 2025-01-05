<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStokBarangTable extends Migration
{
    public function up()
    {
        Schema::create('stok_barang', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang')->unique();
            $table->string('nama_barang');
            $table->integer('quantity')->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('stok_barang');
    }
}

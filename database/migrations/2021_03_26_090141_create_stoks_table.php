<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stoks', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('id_barang');
            $table->string('nama_barang');
            $table->integer('harga_barang');
            $table->integer('jumlah_barang');
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
        Schema::dropIfExists('stoks');
    }
}

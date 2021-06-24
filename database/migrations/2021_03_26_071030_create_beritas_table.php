<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_barang');
            $table->string('nama_barang');
            $table->string('merek_barang');
            $table->string('jumlah_barang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beritas');
    }
}

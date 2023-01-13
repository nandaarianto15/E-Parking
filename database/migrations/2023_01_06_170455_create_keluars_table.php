<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipe_kendaraan');
            $table->integer('nomor_plat');
            $table->integer('tarif');
            $table->integer('kode');
            $table->dateTime('durasi');
            $table->dateTime('waktu_masuk');
            $table->dateTime('waktu_keluar');
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
        Schema::dropIfExists('keluars');
    }
}

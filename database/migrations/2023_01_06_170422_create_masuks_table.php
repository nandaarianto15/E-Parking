<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masuks', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->integer('id_user');
            $table->integer('id_tarif');
            $table->integer('kode')->unique();
            $table->string('gambar')->nullable();
            $table->string('status');
            $table->string('durasi')->nullable();
            // $table->string('tipe_kendaraan')->nullable();
            $table->string('plat')->nullable();
            $table->integer('harga')->nullable();
            // $table->date('tanggal');
            // $table->dateTime('waktu_masuk');
            // $table->dateTime('waktu_keluar')->nullable();
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
        Schema::dropIfExists('masuks');
    }
}

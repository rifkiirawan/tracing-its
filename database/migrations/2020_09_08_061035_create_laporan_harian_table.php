<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanHarianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporanharian', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggal')->nullable();
            $table->unsignedBigInteger('kasus_id')->nullable();
            $table->foreign('kasus_id')->nullable()->references('id')->on('kasus');
            $table->unsignedBigInteger('kriteria_id')->nullable();
            $table->foreign('kriteria_id')->nullable()->references('id')->on('kriteria');
            $table->float('suhu')->nullable();
            $table->text('catatan_its')->nullable();
            $table->text('catatan_eksternal')->nullable();
            $table->text('gejala')->nullable();
            $table->text('keterangan')->nullable();
            $table->unsignedBigInteger('pemantau_id')->nullable();
            $table->foreign('pemantau_id')->nullable()->references('id')->on('pengguna');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan_harian');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatLokasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayatlokasi', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggal')->nullable();
            $table->string('tempat', 200)->nullable();
            $table->unsignedBigInteger('kecamatan_id')->nullable();
            $table->foreign('kecamatan_id')->nullable()->references('id')->on('kecamatan');
            $table->unsignedBigInteger('kelurahan_id')->nullable();
            $table->foreign('kelurahan_id')->nullable()->references('id')->on('kelurahan');
            $table->string('keperluan', 255)->nullable();
            $table->double('longitude')->nullable();
            $table->double('lat')->nullable();
            $table->string('luarnegeri', 200)->nullable();
            $table->unsignedBigInteger('kasus_id')->nullable();
            $table->foreign('kasus_id')->nullable()->references('id')->on('kasus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_lokasi');
    }
}

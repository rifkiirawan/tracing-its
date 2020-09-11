<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kasus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap')->nullable();
            $table->string('nama_inisial')->nullable();
            $table->integer('kode_kasus')->nullable();
            $table->string('alamat_ktp')->nullable();
            $table->unsignedBigInteger('kelurahan_id')->nullable();
            $table->foreign('kelurahan_id')->nullable()->references('id')->on('kelurahan');
            $table->unsignedBigInteger('kecamatan_id')->nullable();
            $table->foreign('kecamatan_id')->nullable()->references('id')->on('kecamatan');
            $table->string('alamat_domisili')->nullable();
            $table->unsignedBigInteger('kelurahanDomisili_id')->nullable();
            $table->unsignedBigInteger('kecamatanDomisili_id')->nullable();
            $table->decimal('NIK', 16, 0)->nullable();
            $table->decimal('nomor_telp', 15, 0)->nullable();
            $table->tinyInteger('jenis_kelamin')->nullable();
            $table->Integer('usia')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->unsignedBigInteger('fungsional_id')->nullable();
            $table->foreign('fungsional_id')->nullable()->references('id')->on('fungsional');
            $table->unsignedBigInteger('departemen_id')->nullable();
            $table->foreign('departemen_id')->nullable()->references('id')->on('departemen');
            $table->unsignedBigInteger('timTracing_id')->nullable();
            $table->double('long_ktp')->nullable();
            $table->double('lat_ktp')->nullable();
            $table->double('long_domisili')->nullable();
            $table->double('lat_domisili')->nullable();
            $table->Integer('status_selesai')->nullable();
            $table->unsignedBigInteger('kriteria_akhir_id')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->tinyInteger('status_kasus')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kasus');
    }
}

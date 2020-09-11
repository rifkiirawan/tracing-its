<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsolasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isolasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kasus_id')->nullable();
            $table->foreign('kasus_id')->nullable()->references('id')->on('kasus');
            $table->string('tempat');
            $table->unsignedBigInteger('RS_id')->nullable();
            $table->foreign('RS_id')->nullable()->references('id')->on('RS');
            $table->text('alamat');
            $table->unsignedBigInteger('kota_id')->nullable();
            $table->foreign('kota_id')->nullable()->references('id')->on('kota');
            $table->double('long');
            $table->double('lat');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('isolasi');
    }
}

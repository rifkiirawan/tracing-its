<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKontakEratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontakerat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kasus_id')->nullable();
            $table->foreign('kasus_id')->nullable()->references('id')->on('kasus');
            $table->unsignedBigInteger('kontak_id')->nullable();
            $table->string('hubungan')->nullable();
            $table->dateTime('tanggal')->nullable();
            $table->string('lokasi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kontak_erat');
    }
}

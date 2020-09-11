<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('RS', function (Blueprint $table) {
            $table->id();
            $table->string('tipe', 2)->nullable();
            $table->string('nama')->nullable();
            $table->unsignedBigInteger('kota_id')->nullable();
            $table->foreign('kota_id')->nullable()->references('id')->on('kota');
            $table->integer('status_rujukan')->nullable();
            $table->string('alamat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('RS');
    }
}

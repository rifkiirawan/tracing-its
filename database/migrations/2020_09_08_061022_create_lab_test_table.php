<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labtest', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('tipe')->nullable();
            $table->unsignedBigInteger('kasus_id')->nullable();
            $table->foreign('kasus_id')->nullable()->references('id')->on('kasus');
            $table->date('tanggal_tes')->nullable();
            $table->date('tanggal_hasil')->nullable();
            $table->tinyInteger('hasil')->nullable();
            $table->string('tempat', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lab_test');
    }
}

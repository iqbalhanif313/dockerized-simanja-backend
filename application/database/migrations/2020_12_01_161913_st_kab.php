<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StKab extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('st_kab', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->unsignedBigInteger('st_provinsi_id');
            $table->foreign('st_provinsi_id')->references('id')->on('st_provinsi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

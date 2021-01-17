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
            $table->string('id',4)->primary();
            $table->string('nama');
            $table->string('st_provinsi_id',2);
            $table->foreign('st_provinsi_id')->references('id')->on('st_provinsi');
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
        //
    }
}

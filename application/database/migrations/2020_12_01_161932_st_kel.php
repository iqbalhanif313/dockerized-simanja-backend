<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StKel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('st_kel', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->unsignedBigInteger('st_kec_id');
            $table->foreign('st_kec_id')->references('id')->on('st_kec');
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

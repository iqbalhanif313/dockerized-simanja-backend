<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StKec extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('st_kec', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->unsignedBigInteger('st_kab_id');
            $table->foreign('st_kab_id')->references('id')->on('st_kab');
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

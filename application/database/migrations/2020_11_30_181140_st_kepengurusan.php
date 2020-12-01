<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StKepengurusan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('st_kepengurusan', function (Blueprint $table) {
            $table->id();
            $table->string('deskripsi');
            $table->unsignedBigInteger('st_level_id');
            $table->foreign('st_level_id')->references('id')->on('st_level');
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

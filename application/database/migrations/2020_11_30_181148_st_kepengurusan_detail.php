<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StKepengurusanDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('st_kepengurusan_detail', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->unsignedBigInteger('st_kepengurusan_id');
            $table->foreign('st_kepengurusan_id')->references('id')->on('st_kepengurusan');
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

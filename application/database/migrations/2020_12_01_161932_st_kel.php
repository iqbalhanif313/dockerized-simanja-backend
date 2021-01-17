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
            $table->string('id',10)->primary();
            $table->string('nama');
            $table->string('st_kec_id',7);
            $table->foreign('st_kec_id')->references('id')->on('st_kec');
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

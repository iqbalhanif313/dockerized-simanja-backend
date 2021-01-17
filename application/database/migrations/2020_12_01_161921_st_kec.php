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
            $table->string('id',7)->primary();
            $table->string('nama');
            $table->string('st_kab_id',4);
            $table->foreign('st_kab_id')->references('id')->on('st_kab');
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

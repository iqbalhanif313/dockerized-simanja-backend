<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MdKepengurusan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('md_kepengurusan', function (Blueprint $table) {
            $table->string('id',5)->primary();
            $table->string('nama');
            $table->string('st_kepengurusan_id',4);
            $table->foreign('st_kepengurusan_id')->references('id')->on('st_kepengurusan');
            $table->string('st_level_id',4);
            $table->foreign('st_level_id')->references('id')->on('st_level');
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

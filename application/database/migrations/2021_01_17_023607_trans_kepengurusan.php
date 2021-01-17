<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TransKepengurusan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trans_kepengurusan', function (Blueprint $table) {
            $table->string('id',36)->primary();
            $table->string('md_jamaah_nik',16);
            $table->foreign('md_jamaah_nik')->references('nik')->on('md_jamaah');
            $table->string('md_kepengurusan_id',36);
            $table->foreign('md_kepengurusan_id')->references('id')->on('md_kepengurusan');
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

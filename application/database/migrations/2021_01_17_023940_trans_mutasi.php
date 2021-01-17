<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TransMutasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trans_mutasi', function (Blueprint $table) {
            $table->string('id',36)->primary();
            $table->string('kelompok_sebelum');
            $table->string('md_jamaah_nik',16);
            $table->foreign('md_jamaah_nik')->references('nik')->on('md_jamaah');
            $table->string('md_kelompok_id',4);
            $table->foreign('md_kelompok_id')->references('id')->on('md_kelompok');
            $table->string('st_tipe_mutasi_id',4);
            $table->foreign('st_tipe_mutasi_id')->references('id')->on('st_tipe_mutasi');
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TransPresensi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trans_presensi', function (Blueprint $table) {
            $table->string('id',36)->primary();
            $table->time('jam_kehadiran');
            $table->string('keterangan')->nullable();
            $table->string('md_jamaah_nik',16);
            $table->foreign('md_jamaah_nik')->references('nik')->on('md_jamaah');
            $table->string('trans_jadwal_id',36);
            $table->foreign('trans_jadwal_id')->references('id')->on('trans_jadwal');
            $table->string('st_status_kehadiran_id',4);
            $table->foreign('st_status_kehadiran_id')->references('id')->on('st_status_kehadiran');
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

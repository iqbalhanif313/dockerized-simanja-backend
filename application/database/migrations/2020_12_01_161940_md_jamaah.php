<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MdJamaah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('md_jamaah', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->bigInteger('nik');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('hp',13);
            $table->string('alamat');
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('user');
            $table->unsignedBigInteger('st_kelompok_id');
            $table->foreign('st_kelompok_id')->references('id')->on('st_kelompok');
            $table->unsignedBigInteger('st_kategori_jamaah_id');
            $table->foreign('st_kategori_jamaah_id')->references('id')->on('st_kategori_jamaah');
            $table->unsignedBigInteger('st_status_jamaah_id');
            $table->foreign('st_status_jamaah_id')->references('id')->on('st_status_jamaah');
            $table->unsignedBigInteger('provinsi_id');
            $table->foreign('provinsi_id')->references('id')->on('provinsi');
            $table->unsignedBigInteger('kab_id');
            $table->foreign('kab_id')->references('id')->on('kab');
            $table->unsignedBigInteger('kec_id');
            $table->foreign('kec_id')->references('id')->on('kec');
            $table->unsignedBigInteger('kel_id');
            $table->foreign('kel_id')->references('id')->on('kel');
            $table->timestamps();
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

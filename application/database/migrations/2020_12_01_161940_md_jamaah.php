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
            $table->string('nik',16)->primary();
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('hp',13);
            $table->string('alamat');
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('user');
            $table->string('md_kelompok_id',4);
            $table->foreign('md_kelompok_id')->references('id')->on('md_kelompok');
            $table->string('st_kategori_jamaah_id',4);
            $table->foreign('st_kategori_jamaah_id')->references('id')->on('st_kategori_jamaah');
            $table->string('st_status_jamaah_id',4);
            $table->foreign('st_status_jamaah_id')->references('id')->on('st_status_jamaah');
            $table->string('st_provinsi_id',2);
            $table->foreign('st_provinsi_id')->references('id')->on('st_provinsi');
            $table->string('st_kab_id',4);
            $table->foreign('st_kab_id')->references('id')->on('st_kab');
            $table->string('st_kec_id',7);
            $table->foreign('st_kec_id')->references('id')->on('st_kec');
            $table->string('st_kel_id',10);
            $table->foreign('st_kel_id')->references('id')->on('st_kel');
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

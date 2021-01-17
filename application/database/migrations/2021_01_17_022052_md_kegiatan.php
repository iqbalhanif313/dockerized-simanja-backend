<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MdKegiatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('md_kegiatan', function (Blueprint $table) {
            $table->string('id',36)->primary();
            $table->string('deskripsi');
            $table->string('st_level_id',4);
            $table->foreign('st_level_id')->references('id')->on('st_level');
            $table->string('st_jenis_kegiatan_id',4);
            $table->foreign('st_jenis_kegiatan_id')->references('id')->on('st_jenis_kegiatan');
            $table->string('st_kategori_jamaah_id',4);
            $table->foreign('st_kategori_jamaah_id')->references('id')->on('st_kategori_jamaah');
            $table->string('st_desa_id',4)->nullable();
            $table->foreign('st_desa_id')->references('id')->on('st_desa');
            $table->string('md_kelompok_id',4)->nullable();
            $table->foreign('md_kelompok_id')->references('id')->on('md_kelompok');
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

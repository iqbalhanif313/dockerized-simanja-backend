<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MdKelompok extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('md_kelompok', function (Blueprint $table) {
            $table->string('id',4)->primary();
            $table->string('nama');
            $table->string('alamat')->nullable();
            $table->string('st_desa_id',4);
            $table->foreign('st_desa_id')->references('id')->on('st_desa');
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

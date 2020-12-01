<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriJamaahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // "id","deskripsi"
        // 1,"Remaja"
        // 2,"Pra Remaja"
        // 3,"Caberawit"
        // 4,"Dewasa"
        DB::table('st_kategori_jamaah')->insert([
            [
                "id" => 1,
                "deskripsi" => "Remaja"
            ],
            [
                "id" => 2,
                "deskripsi" => "Pra Remaja"
            ]
        ]);

    }
}

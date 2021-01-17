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
        DB::table('st_kategori_jamaah')->insert([
            [
                "id" => "R",
                "nama" => "Remaja"
            ],
            [
                "id" => "PR",
                "nama" => "Pra Remaja"
            ],
            [
                "id" => "CR",
                "nama" => "Caberawit"
            ],
            [
                "id" => "D",
                "nama" => "Dewasa"
            ]
        ]);

    }
}

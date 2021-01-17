<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('st_provinsi')->insert([
            [
                "id" => "11",
                "nama" => "ACEH"
            ],
            [
                "id" => "12",
                "nama" => "SUMATERA UTARA"
            ]
        ]);
    }
}

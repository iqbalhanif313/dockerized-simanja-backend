<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('st_kab')->insert([
            [
                "id" => "1101",
                "nama" => "KABUPATEN SIMEULUE",
                "st_provinsi_id" => "11"
            ],
            [
                "id" => "1102",
                "nama" => "KABUPATEN ACEH SINGKIL",
                "st_provinsi_id" => "11"
            ],
        ]);
    }
}

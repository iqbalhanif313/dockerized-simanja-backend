<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('st_kel')->insert([
            [
                "id" => "1101010001",
                "nama" => "LATIUNG",
                "st_kec_id" => "1101010"
            ]
        ]);
    }
}

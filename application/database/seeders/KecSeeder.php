<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KecSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('st_kec')->insert([
            [
                "id" => "1101010",
                "nama" => "TEUPAH SELATAN",
                "st_kab_id" => "1101"
            ]
        ]);
    }
}

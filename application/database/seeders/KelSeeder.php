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
        DB::table('kel')->insert([
            [
                "id" => 1,
                "nama" => "Medokan Semampir",
                "kec_id" => 1
            ]
        ]);
    }
}

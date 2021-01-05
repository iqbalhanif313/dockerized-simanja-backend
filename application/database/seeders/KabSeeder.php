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
                "id" => 1,
                "nama" => "Surabaya",
                "st_provinsi_id" => 1
            ]
        ]);
    }
}
